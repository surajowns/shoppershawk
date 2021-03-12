<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use Auth;
use App\CartModel;
use App\Product;

class CheckoutController extends Controller
{
     public function Checkout(Request $request)
     {   
             $userdeta=Auth::user();
             $subtotal=0;
             if(!empty($userdeta)){
                    
                $details=CartModel::with(['products'=>function($query){$query->select('id','name');}])->where('user_id',$userdeta['id'])->get()->toArray();
                
                 foreach($details as $data){
                     $subtotal=$subtotal+$data['quantity']*$data['price'];
                 }

             }else{
                $details=Cart::getContent()->toArray();
             }
             return view('front.common.checkout',compact('details','userdeta','subtotal'));
     }
}
