<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RazorpayController extends Controller
{
    //  public function __construct()
    //  {
    //      $this->middleware('UserSession');
    //  }
    public function pay() {
       return view('front.payment.pay');
    }

    public function dopayment(Request $request) {
        //Input items of form
        $input = $request->all();
       // dd($input);
        // Please check browser console.
        print_r($input);
        exit;
    }
}
