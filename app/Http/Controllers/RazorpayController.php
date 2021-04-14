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
        try{

        $user= User::where('id',$request->user_id)->first();
        // dd($user);
        if(!$user)
        {
            return response()->json([
                'message' => 'user not exist',
                 'status' => 400,
            ],400);            
        }
        $address = DeliveryAddressModel::where('id',$request->address_id)->first();
        // dd($address);
        if(!$address)
        {
            return response()->json([
                'message' => 'address id not exist',
                 'status' => 400,
            ],400);            
        }
        $cart=CartModel::where('user_id',$request->user_id)->get();
            // dd(count($cart));
        if(count($cart)<0)
        {
            return response()->json([
                'message' => 'cart is empty',
                 'status' => 400,
            ],400);            
        }
        $grand_total=0;
        $total_item_price=0;
        $quantity=0;
        $restaurant_id=0;
        $discount=0;
        $shipping=0;
        $coupon='dvs';
        foreach($cart as $details){
          $total_item_price= $total_item_price + $details['price']*$details['quantity'];
          $quantity=$quantity+ $details['quantity'];
          $restaurant_id=$details['restaurant_id'];

          
        }
        $total_items=count($cart);
        // print_r($cart);
        $grand_total= $grand_total+ $total_item_price+  $shipping;
       $order=new Order;
       $order->user_id=$request->user_id;;
       $order->restaurant_id=$restaurant_id;
       $order->type=$request->type;
       $order->total_items= $quantity;
       $order->mobile_number=$user->mobile;
       $order->pincode=$address->pin_code;
       $order->address_id=$request->address_id;
       $order->status=0;
       $order->price=$total_item_price;
       $order->discount=$discount;
       $order->total_price=$grand_total;
       $order->coupon=$coupon;

       $order->save();
       if($order->save()){
           Order::where('id',$order->id)->update(['order_no'=> "VT000".$order->id]);
        foreach($cart as $row){

            $Orderdetail=array(
               "order_id"=>$order->id,
                "user_id"=>$request->user_id,
                "restaurant_id"=>$restaurant_id,
                "item_id"=>$row['item_id'],
                "quantity"=>$row['quantity'],
                "price"=>$row['price'],
                "total_price"=>$row['price']*$row['quantity'],
            );
            Orderdetail::create($Orderdetail);

            $userOrder=Order::where('id',$order->id)->first();
            $order_no=$userOrder['order_no'];
            $vendor=VendorModel::where('id',$restaurant_id)->first();
            $venoderDetails=User::where('id',$vendor['user_id'])->first();
            $userMobile=$user['mobile'].',';
            $vendorMobile=$venoderDetails['mobile'].',';
            $adminDetails=adminDetails();
            $admin_nunber=$adminDetails->mobile;
            $mobile_number=$user['mobile'].','.$venoderDetails['mobile'].','.$admin_nunber;

            $this->sendSms($mobile_number, $order_no);
            // $result=$this->orderEmail($userOrder,$userOrderItems,$address,$user, $vendor);

        }
        CartModel::where('user_id',$request->user_id)->delete();

        return response()->json(['message' =>'Your order successfully placed. We will deliver your order soon.','status' => 200]);

       }


        }catch(\Exception $e){
            return response()->json(['data' => $e->getMessage(),'status' => 400]);
        }
                

    }
}
