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
use App\Transaction;
use Razorpay\Api\Api;

class RazorpayController extends Controller
{
    //  public function __construct()
    //  {
    //      $this->middleware('UserSession');
    //  }
    public function razorpay(Request $request)
    {       
        $amount=$request->amount;
        return view('admin.pages.payment',compact('amount'));
    } 

    public function payment(Request $request)
    {        
        $name = $request->input('name');
        $amount = $request->input('amount');

        $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));
        $order  = $api->order->create(array('receipt' => '123', 'amount' => 200 * 100 , 'currency' => 'INR')); // Creates order
        $orderId = $order['id']; 

        $user_pay = new Transaction();
    
        // $user_pay->name = $name;
        $user_pay->amount = $amount;
        $user_pay->payment_id = $orderId;
        $user_pay->save();

        $data = array(
            'order_id' => $orderId,
            'amount' => $amount
        );
    }


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
    //     DB::beginTransaction();
    //     try{
    //      $data=$request->except('_token');

    //      $cartsdetails=CartModel::where('user_id',$user->id)->get();
    //      $total=0;
    //      $quantity=0;
    //      $discount=0;
    //      foreach($cartsdetails as $value){
    //            $quantity= $quantity+$value['quantity'];
    //          $total=$total+$value['quantity']*$value['price'] ;  
    //      }
 
    //      $discount=session()->has('discount_amount')?Session::get('discount_amount'):0;
 
    //      $data['price']=$total;
    //      $data['user_id']=$user['id'];
    //      $data['price']=$total;
    //      $data['quantity']=$quantity;
    //      $data['status']=1;
    //      $data['total_amount']=$total - $discount;
    //      $data['coupon'] =session()->has('code')?Session::get('code'):'';
    //      $data['discount'] = $discount;
       

    //      $data['created_at']=date('Y-m-d h:i:s');
    //      $date = Carbon\Carbon::now('Asia/Kolkata');
    //      $created_at= $date->toDateTimeString();
    //      $data['created_at']=$created_at;
    //      $data['updated_at']=$created_at;

    //      $order=Order::insert($data);
    //      if($order){
    //           $order_id= Order::orderBy('id', 'DESC')->first();
    //           $order_no='SHOPPERSHAWK#'.$order_id['id'];
    //           Order::where('id',$order_id['id'])->update(['order_no'=>$order_no]);
    //           $cartsdetails=CartModel::where('user_id',$user->id)->get();

    //           foreach($cartsdetails as $details){
    //                 $ordersdetails=new OrderDetails;
    //                 $ordersdetails->user_id=$user['id'];
    //                 $ordersdetails->order_id=$order_id['id'];
    //                 $ordersdetails->product_id=$details['product_id'];
    //                 $ordersdetails->price=$details['price'];
    //                 $ordersdetails->quantity=$details['quantity'];
    //                 $ordersdetails->total_amount=$details['quantity']*$details['price'];
    //                 $ordersdetails->status=2;
    //                 $ordersdetails->save();
    //                 Product::where('id',$details['product_id'])->decrement('qty',$details['quantity']);

    //           }
    //           Session::forget('code'); 
    //           Session::forget('discount_amount') ; 
    //           Cart::clear();
    //           CartModel::where('user_id',$user['id'])->delete();
            
    //      }
    //      else {
    //           return response()->json(['error'=>'something went wrong']);
    //      }
    //      $content="Order from ".$user['name']." with Order No  ".$order_no;
    //      NotificationModel::insert(['user_id'=>$user['id'],'content'=>$content,'type'=>$order_no]);
    //      DB::commit();
    //      $orders=Order::with('orderdetails','orderdetails.products','orderdetails.productImage')->orderBy('id','DESC')->first();
        
    //       $emailsent= OrderEmail($user,$order_no,$orders);
    //      if($emailsent){
    //      return response()->json(['order_no'=>$order_no,'order_id'=>$order_id['id']]);

    //      }else{
    //      return response()->json(['order_no'=>$order_no,'order_id'=>$order_id['id']]);

    //      }
    //     }catch(\Exception $e){
    //         DB::rollback();    
    //         return response()->json(['error'=>$e->getMessage()]);
    //    } 
    }else {
        return response()->json(['error'=>'login first']);
      }
                

    }

    public function Orderupdate(Request $request)
    {
          
        //dd($request->all());
        $user=Auth::user();
        $input = $request->except('_token');        
        $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));
        $payment = $api->payment->fetch($input['payment_id']);
      // print_r($payment);
        if(count($input)  && !empty($input['payment_id']) &&  $payment['status']==='authorized') 
        {
            try 
            {
                DB::beginTransaction();
                   
                     $data=$request->except('_token','payment_id');
            
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
            //dd($data);
                     $order=Order::insert($data);
                    // print_r($order);
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
                          Session::forget('discount_amount'); 
                          Cart::clear();
                          CartModel::where('user_id',$user['id'])->delete();
                          $order=Order::orderBy('id','DESC')->first();
                          $transaction =new Transaction;
                          // $data=$request->except('_token');
                          $transaction->payment_id=$payment['id'];
                          $transaction->bank_transaction_id=isset($payment['acquirer_data']['bank_transaction_id'])?$payment['acquirer_data']['bank_transaction_id']:'';
                          $transaction->upi_transaction_id=isset($payment['acquirer_data']['upi_transaction_id'])?$payment['acquirer_data']['upi_transaction_id']:'';
                          $transaction->payment_email=$payment['email'];
                          $transaction->contact=$payment['contact'];
                          $transaction->order_id=$order['id'];
                          $transaction->payment_status=$payment['status'];
                          $transaction->amount=$payment['amount'];
                          $transaction->method=$payment['method'];
                          $transaction->bank=$payment['bank'];
                           $transaction->save();
                          //Transaction::insert($data);
                          Order::where('id',$order_id['id'])->update(['order_type'=>$payment['method']]);

                          //\Session::put('success', 'Payment successful, your order will be despatched in the next 48 hours.');
                         // return response()->json(['status'=>'success']);
                        
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
                     return response()->json(['order_no'=>$order_no,'order_id'=>$order_id['id'],'status'=>$payment['status']]);
            
                     }else{
                       return response()->json(['order_no'=>$order_no,'order_id'=>$order_id['id'],'status'=>$payment['status']]);
            
                     }
                   
                //$response = $api->payment->fetch($input['payment_id'])->capture(array('amount'=>$payment['amount'])); 
                
            } 
            catch (\Exception $e) 
            {
                return response()->json(['error'=>$e->getMessage()]);
                \Session::put('error',$e->getMessage());
            }            
        }else{
            return response()->json(['error'=>'something went wrong']); 
        }
          
    }

    public function WebhookSuccess(Request $request )
    {
         dd($request->all());
          

    }

}
