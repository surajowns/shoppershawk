<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Order;
use App\OrderDetails;

class OrderController extends Controller
{
    public function Index(Request $request)
    {
       
           $orders=Order::with('users','status')->get()->toArray();
           return view('admin.orders.index',compact('orders'));    
    }
}
