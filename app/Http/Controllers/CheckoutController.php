<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;

class CheckoutController extends Controller
{
     public function Checkout(Request $request)
     {   
             
             $details=Cart::getContent()->toArray();
            return view('front.common.checkout',compact('details'));
     }
}
