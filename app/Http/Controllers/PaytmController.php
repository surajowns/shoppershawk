<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use PaytmWallet;
use App\Order;
use App\OrderDetails;
use Session;
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

class PaytmController extends Controller
{
         
     /**
     * Redirect the user to the Payment Gateway.
     *
     * @return Response
     */
    public function pay(Request $request){

      // dd($request->all());
       $user=Auth::user();
       $data=$request->except('_token','payment_id');
       Session::put('addressData',$data);
      //  dd($this->addressdata);
       try{
        $cartsdetails=CartModel::where('user_id',$user->id)->get();
        if(count($cartsdetails)==0){
            return redirect('/');
        }
        $total=0;
        $quantity=0;
        $discount=0;
        $total_amount=0;
        foreach($cartsdetails as $value){
              $quantity= $quantity+$value['quantity'];
            $total=$total+$value['quantity']*$value['price'] ;  
        }
       $discount=session()->has('coupon')?Session::get('coupon'):0;
        if($request->input('coupon') != ""){
            $coupon=CouponModel::where('code',$request->coupon)->where('status',1)->first();
            $discount=$coupon['discount'];
        }
        $total_amount=$total - $discount;
        $order_id= Order::orderBy('id', 'DESC')->first();
       
                $payment = PaytmWallet::with('receive');
                $payment->prepare([
                'order' =>$order_id['id']+1,
                'user' => $user->id,
                'mobile_number' => isset($user->mobile)?$user->mobile:$data['billing_mobile'],
                'email' => $user->email,
                'amount' =>$total_amount, 
                'callback_url' => url('/payment/status'),
                ]);
                // $this->paymentCallback($data);
                return   $payment->receive();

            }catch(\Exception $e){
             dd($e->getMessage().$e->getLine());
          }
    }

    /**
     * Obtain the payment information.
     *
     * @return Object
     */
    public function paymentCallback()
    {  
        $user=Auth::user();
        try{
        $transaction = PaytmWallet::with('receive');
        $response = $transaction->response(); // To get raw response as array
        //Check out response parameters sent by paytm here -> http://paywithpaytm.com/developer/paytm_api_doc?target=interpreting-response-sent-by-paytm
        // dd($response);
        if($transaction->isSuccessful()){
         
           DB::beginTransaction();
                   
                     $data=Session::get('addressData');
            
                     $cartsdetails=CartModel::where('user_id',$user->id)->get();
                     $total=0;
                     $quantity=0;
                     $discount=0;
                     foreach($cartsdetails as $value){
                           $quantity= $quantity+$value['quantity'];
                         $total=$total+$value['quantity']*$value['price'] ;  
                     }
             
                     $discount=session()->has('discount_amount')?Session::get('discount_amount'):Session::get('discount');
             
                     $data['price']=$total;
                     $data['user_id']=$user['id'];
                     $data['price']=$total;
                     $data['quantity']=$quantity;
                     $data['status']=1;
                     $data['total_amount']=$total - $discount;
                     $data['coupon'] =session()->has('code')?Session::get('code'):Session::get('coupon');
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
                          Session::forget('discount_amount'); 
                          Cart::clear();
                          CartModel::where('user_id',$user['id'])->delete();
                          $order=Order::orderBy('id','DESC')->first();
                          $transaction =new Transaction;
                          $transaction->payment_id=$response['TXNID'];
                          $transaction->pay_order_id=$response['ORDERID'];
                          $transaction->bank_transaction_id=$response['BANKTXNID'];
                          // $transaction->upi_transaction_id=isset($response['acquirer_data']['upi_transaction_id'])?$response['acquirer_data']['upi_transaction_id']:'';
                          // $transaction->payment_email=$response['email'];
                          // $transaction->contact=$response['contact'];
                          $transaction->order_id=$response['ORDERID'];
                          $transaction->payment_status=$response['STATUS'];
                          $transaction->amount=$response['TXNAMOUNT'];
                          $transaction->method=$response['PAYMENTMODE'];
                          $transaction->bank=$response['BANKNAME'];
                          $transaction->save();
                          Order::where('id',$order_id['id'])->update(['order_type'=>$response['PAYMENTMODE']]);
                     }
                     else {
                          return redirect('/')->with(['error'=>'something went wrong']);
                     }
                     $content="Order from ".$user['name']." with Order No  ".$order_no;
                     NotificationModel::insert(['user_id'=>$user['id'],'content'=>$content,'type'=>$order_no]);
                     DB::commit();
                     $orders=Order::with('orderdetails','orderdetails.products','orderdetails.productImage')->orderBy('id','DESC')->first();
                     Session::forget('coupon');
                     Session::forget('discount');
                     Session::forget('addressData');

                      $emailsent= OrderEmail($user,$order_no,$orders);
                     if($emailsent){
                       return redirect('/user/thanku')->with('success',$response['RESPMSG']);
                      //  return response()->json(['order_no'=>$order_no,'order_id'=>$order_id['id'],'status'=>$payment['status']]);
                     }else{
                      return redirect('/user/thanku')->with('success',$response['RESPMSG']);
                      //  return response()->json(['order_no'=>$order_no,'order_id'=>$order_id['id'],'status'=>$payment['status']]);
                     }
          // return redirect('/paytm/payment')->with('message', "Your payment is Successfull.");
        }else if($transaction->isFailed()){
          // dd($response);
             return redirect('/user/checkout')->with('message', $response['RESPMSG']);
        }else if($transaction->isOpen()){
          return redirect('/user/checkout')->with('message', $response['RESPMSG']);
        }
       // $transaction->getResponseMessage(); //Get Response Message If Available
        //get important parameters via public methods
       // $transaction->getOrderId(); // Get order id

       // $transaction->getTransactionId(); // Get transaction id
      }catch(\Exception $e){
          dd($e->getMessage().$e->getLine());
      }
    }    
}
