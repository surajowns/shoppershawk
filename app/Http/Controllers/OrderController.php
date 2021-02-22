<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\OrderDetails;
use Session;
use Auth;
use App\CartModel;

class OrderController extends Controller
{
       public function createOrder(Request $request)
       {
             $data=$request->all();
             dd($data);   
         
       }
}
