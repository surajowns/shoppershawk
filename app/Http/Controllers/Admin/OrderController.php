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
    public function OrderbyStatus(Request $request,$status=null)
    {
        $orders=Order::with('users','status')->where('status',$status)->orderBy('id','DESC')->get()->toArray();
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
    public function updateitem_status(Request $request)
    {
        $result=orderDetails::where('id',$request->id)->update(['status'=>$request->status_change]);
        if($result){
            return redirect('admin/orders/viewdetails/'.$request->order_id)->with('success','Status Updated successfull');
        }
    }
    public function orderDetails(Request $request,$id=null)
    {      
           $orders=Order::with('users','status')->where('id',$id)->first();
           $orderdetails=orderDetails::with('products','products.productImage')->where('order_id',$id)->get();
           $status=Status::get();
           return view('admin.orders.orderdetails',compact('orders','orderdetails','status'));
           //dd($orderdetais);
    }
}