<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Order;
use App\OrderDetails;
use App\Status;

class OrderController extends Controller
{
    public function Index(Request $request)
    {
       
           $orders=Order::with('users','status')->orderBy('id','DESC')->get()->toArray();
           $status=Status::get();
           return view('admin.orders.index',compact('orders','status'));    
    }

    public function updatestatus(Request $request)
    {
        
        $result=Order::where('id',$request->order_id)->update(['status'=>$request->status_change]);
        if($result){
            return redirect('admin/orders')->with('success','Status Updated successfull');
        }
    }
}
