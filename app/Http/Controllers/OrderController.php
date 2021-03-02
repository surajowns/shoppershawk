<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\OrderDetails;
use Session;
use Auth;
use App\CartModel;
use validator;
use DB;
use Cart;
use Product;
use Carbon;
class OrderController extends Controller
{
       public function createOrder(Request $request)
       {
            $user=Auth::user();
            if($user){
            $validatedData = $request->validate([
                  'order_type' => 'required',
                  'billing_state'=>'required'
              ]);

            try{
             
             $data=$request->except('_token');

             $cartsdetails=CartModel::where('user_id',$user->id)->get();
             $total=0;
             $quantity=0;
             foreach($cartsdetails as $value){
                   $quantity= $quantity+$value['quantity'];
                 $total=$total+$value['quantity']*$value['price'] ;  
             }

             $data['price']=$total;
             $data['user_id']=$user['id'];
             $data['price']=$total;
             $data['quantity']=$quantity;
             $data['status']=1;
             $data['total_amount']=$total-Session::get('discount');
             $data['coupon'] = Session::get('coupon');
             $data['discount'] =  Session::get('discount');
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

                  }
                  Cart::clear();
                  CartModel::where('user_id',$user['id'])->delete();
                  return redirect('user/thanku')->with(['order_no'=>$order_no,'order_id'=>$order_id['id']]);

                 // return redirect('',compact('order_no'));
                 //return back()->with('success','order placed');
                  // return view('front.thanku',compact('order_id'));
             }
             else {
                  return back()->with('error','something went wrong');
             }
              }catch(\Exception $e){
                  // dd($e->getMessage());
                  return back()->with('error',$e->getMessage());
          } 
      }
       else {
            return back()->with('error','login first');
          }
         
      }
}
