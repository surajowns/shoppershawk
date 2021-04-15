<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\OrderDetails;
use Session;
use Auth;
use App\CartModel;
use Validator;
use DB;
use Cart;
use App\Product;
use Carbon;
use App\CouponModel;
use App\NotificationModel;
use App\User;

class RazorpayController extends Controller
{
    //  public function __construct()
    //  {
    //      $this->middleware('UserSession');
    //  }
    public function pay() {
       return view('front.payment.pay');
    }

    // public function dopayment(Request $request) {
    //     //Input items of form
    //     $input = $request->all();
    // //    dd($input);
    //     // Please check browser console.
    //     return $input;
      
    // }


    public function dopayment(Request $request)
    {
        // dd($request->all());

        $user=Auth::user();
        
        if($user){
        $validator = Validator::make($request->all(), [
            'billing_name' => 'required',
            'billing_email'=>'required',
            'billing_country'=>'required',
            'billing_state'=>'required',
            'billing_address'=>'required',
            'billing_landmark'=>'required',
            'billing_mobile'=>'required',
            'billing_pincode'=>'required'
        ]);
     
        if ($validator->fails()) {
            return response()->json([
                'error' => $validator->messages()->first(),
                 'status' => 400,
            ],400);
        }
        DB::beginTransaction();
        try{
         $data=$request->except('_token');

         $cartsdetails=CartModel::where('user_id',$user->id)->get();
         $total=0;
         $quantity=0;
         $discount=0;
         foreach($cartsdetails as $value){
               $quantity= $quantity+$value['quantity'];
             $total=$total+$value['quantity']*$value['price'] ;  
         }
 
         $discount=session()->has('discount_amount')?Session::get('discount_amount'):0;
 
         $data['price']=$total;
         $data['user_id']=$user['id'];
         $data['price']=$total;
         $data['quantity']=$quantity;
         $data['status']=1;
         $data['total_amount']=$total - $discount;
         $data['coupon'] =session()->has('code')?Session::get('code'):'';
         $data['discount'] = $discount;
       

         $data['created_at']=date('Y-m-d h:i:s');
         $date = Carbon\Carbon::now('Asia/Kolkata');
         $created_at= $date->toDateTimeString();
         $data['created_at']=$created_at;
         $data['updated_at']=$created_at;

         $order=Order::insert($data);
         if($order){
              $order_id= Order::orderBy('id', 'DESC')->first();
              $order_no='SHOPPERSHAWK#'.$order_id['id'];
              Order::where('id',$order_id['id'])->update(['order_no'=>$order_no]);
              $cartsdetails=CartModel::where('user_id',$user->id)->get();

              foreach($cartsdetails as $details){
                    $ordersdetails=new OrderDetails;
                    $ordersdetails->user_id=$user['id'];
                    $ordersdetails->order_id=$order_id['id'];
                    $ordersdetails->product_id=$details['product_id'];
                    $ordersdetails->price=$details['price'];
                    $ordersdetails->quantity=$details['quantity'];
                    $ordersdetails->total_amount=$details['quantity']*$details['price'];
                    $ordersdetails->status=2;
                    $ordersdetails->save();
                    Product::where('id',$details['product_id'])->decrement('qty',$details['quantity']);

              }
              Session::forget('code'); 
              Session::forget('discount_amount') ; 
              Cart::clear();
              CartModel::where('user_id',$user['id'])->delete();
            
         }
         else {
              return response()->json(['error'=>'something went wrong']);
         }
         $content="Order from ".$user['name']." with Order No  ".$order_no;
         NotificationModel::insert(['user_id'=>$user['id'],'content'=>$content,'type'=>$order_no]);
         DB::commit();
         $orders=Order::with('orderdetails','orderdetails.products','orderdetails.productImage')->orderBy('id','DESC')->first();
        
          $emailsent= OrderEmail($user,$order_no,$orders);
         if($emailsent){
         return response()->json(['order_no'=>$order_no,'order_id'=>$order_id['id']]);

         }else{
         return response()->json(['order_no'=>$order_no,'order_id'=>$order_id['id']]);

         }
        }catch(\Exception $e){
            DB::rollback();    
            return response()->json(['error'=>$e->getMessage()]);
       } 
    }else {
        return response()->json(['error'=>'login first']);
      }
                

    }
}
