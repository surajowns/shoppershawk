<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use Auth;

class CheckoutController extends Controller
{
     public function Checkout(Request $request)
     {   
             $userdeta=Auth::user();
             $details=Cart::getContent()->toArray();
             return view('front.common.checkout',compact('details','userdeta'));
     }
}
