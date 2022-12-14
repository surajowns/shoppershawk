<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\OrderDetails;
use App\Status;
use Auth;
use Validator;
use Session;
use App\User;
use App\Refferal;
class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('UserSession');
    }
    public function Index(Request $request)
    {
         $user=Auth::user();
         $orders=Order::with('users','status','additionalCharges')->where('user_id',$user['id'])->orderBy('id','DESC')->get()->toArray();
         $status=Status::get();
         $refferal=Refferal::where('user_id',$user['id'])->first();
          if(isset($refferal['referrer_id'])){
            $referral_user=User::where('referrer_id',$refferal['referrer_id'])->get();
          }else{
               $referral_user=0;
          }
         
         return view('front.common.useraccount',compact('user','orders','status','refferal','referral_user'));
    }
    
    public function UpdateProfile(Request $request)
    {   
        $user=Auth::user();
     
        if ($request->isMethod('post')) {
            $validator = Validator::make($request->all(), [
                    'email' => 'required',
                    'name'	=> 'required',
            ]);

            try{
                 $checked=User::where('id','!=',$user['id'])->where('email',$request->email)->first();
                 if(!empty($checked)){
                    return back()->with('error','Email already exist');
                 }
                 $checkedmob=User::where('id','!=',$user['id'])->where('mobile',$request->mobile)->first();
                 if(!empty($checkedmob)){
                    return back()->with('error','Mobile already exist');
                 }

                $data=  request()->except('_token');

                if($request->hasFile('profile_image')){
                    $image = $request->file('profile_image');
                    $name = time().'.'.$image->getClientOriginalExtension();
                    $destinationPath = public_path('/profile');
                    $image->move($destinationPath, $name);
                    $data['profile_image']=$name;
                }
               
                User::where('id',Auth::user()['id'])->update($data);
                return back()->with('success','Profile updated');
            }catch(\Exception $e){
                return back()->with('error',$e->getMessage());
            }
           
            } 
    }

    public function OrderDetails(Request $request,$order_id=null)
    {
       

        $orders=Order::with('users','status','additionalCharges')->where('id',$order_id)->first();
        $transaction_amount=$orders['additionalCharges'][0]['amount'];
        $total_amount=$orders['total_amount'];
        $additinal_charges=$transaction_amount-$total_amount;
        $orderdetails=orderDetails::with('products','products.productImage')->where('order_id',$order_id)->get();
        $status=Status::get();
        return view('front.common.orderdetails',compact('orders','orderdetails','status','additinal_charges','total_amount'));

    }
    


}
