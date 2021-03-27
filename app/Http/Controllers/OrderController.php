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
class OrderController extends Controller
{

     public function __construct()
     {
         $this->middleware('UserSession');
     }
     public function applycoupon(Request $request)
     {
           $user=Auth::user();
           $date=Date('Y-m-d');
           $validator = Validator::make($request->all(), [
             'code'=>'required',    
         ]); 
         if ($validator->fails()) {
             return back()->with(['error'=>$validator->messages()->first()]);
 
         }
      $coupon=CouponModel::where('code',$request->code)->where('starting_at','<=',$date)->where('end_at','>=',$date)->where('status',1)->first();
     //  dd($coupon);
     
      if($coupon == null){
         return back()->with(['error'=>"Invalid Coupon"]);
        }
        else{
         $discount=$coupon['discount'];
         $coupon_code=$coupon['code'];
        $minimum_amount=$coupon['minimum_amount'];
         if($user){
          $cartDetails=CartModel::where('user_id',$user['id'])->get()->toArray();
         }else{
          $cartDetails=Cart::getContent()->toArray();
         }
         // dd($cartDetails);
         $item_total=0;
         foreach($cartDetails as $details){
             $item_total= $item_total + $details['price']*$details['quantity'];            
           }
           $item_total;
           if($minimum_amount <= $item_total){
              Session::put('coupon',$coupon_code);
              Session::put('discount',$discount);
             return back()->with(['success'=>"Coupon applied successfull",'discount'=>$discount,'coupon'=>$coupon_code]);
           }else{
             return back()->with(['error'=>"Coupon not  available for this order"]);
           }
         }
     }

       public function createOrder(Request $request)
       {   
       
            $user=Auth::user();
            if($request->gst_no != ''){
               $validatedData = $request->validate([
                    'gst_no' => 'required|min:15|max:15',
                    'bussiness_name'=>'required'
                ]);   
              }
            if($user){
            $validatedData = $request->validate([
                  'order_type' => 'required',
                  'billing_state'=>'required'
              ]);
             
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
                  return back()->with('error','something went wrong');
             }
             $content="Order from ".$user['name']." with Order No  ".$order_no;
             NotificationModel::insert(['user_id'=>$user['id'],'content'=>$content,'type'=>$order_no]);
             DB::commit();
             $orders=Order::with('orderdetails','orderdetails.products','orderdetails.productImage')->orderBy('id','DESC')->first();
            
              $emailsent= OrderEmail($user,$order_no,$orders);
             if($emailsent){
             return redirect('user/thanku')->with(['order_no'=>$order_no,'order_id'=>$order_id['id']]);

             }else{
             return redirect('user/thanku')->with(['order_no'=>$order_no,'order_id'=>$order_id['id']]);

             }
              }catch(\Exception $e){
                DB::rollback();    
                return back()->with('error',$e->getMessage());
          } 
      }
       else {
            return back()->with('error','login first');
          }
         
      }
}
