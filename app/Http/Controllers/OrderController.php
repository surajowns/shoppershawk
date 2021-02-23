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
class OrderController extends Controller
{
       public function createOrder(Request $request)
       {
            $user=Auth::user();
            if($user){
            $validatedData = $request->validate([
                  'order_type' => 'required',
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
            

             $order=Order::insert($data);
             if($order){
                  $order_id= Order::orderBy('id', 'DESC')->first();
                  $cartsdetails=CartModel::where('user_id',$user->id)->get();
                  foreach($cartsdetails as $details){
                        $cartsdetails=new OrderDetails;
                        $cartsdetails->user_id=$user['id'];
                        $cartsdetails->order_id="SHOPPERSHAWK000".$order_id['id'];
                        $cartsdetails->product_id=$details['product_id'];
                        $cartsdetails->price=$details['price'];
                        $cartsdetails->quantity=$details['quantity'];
                        $cartsdetails->total_amount=$details['quantity']*$details['price'];
                       $cartsdetails->save();

                  }
                  Cart::clear();
                  CartModel::where('user_id',$user['id'])->delete();
                  return back()->with('success','order placed');
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
