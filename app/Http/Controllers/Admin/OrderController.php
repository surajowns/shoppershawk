<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Order;
use App\OrderDetails;
use App\Status;
use PDF;

class OrderController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('CheckSession');
    }
    
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
           $orders=Order::with('users','status','additionalCharges')->where('id',$id)->first();
           $transaction_amount=$orders['additionalCharges'][0]['amount'];
           $total_amount=$orders['total_amount'];
           $additinal_charges=$transaction_amount-$total_amount;
           $orderdetails=orderDetails::with('products','products.productImage')->where('order_id',$id)->get();
           $status=Status::get();
           return view('admin.orders.orderdetails',compact('orders','orderdetails','status','additinal_charges','transaction_amount'));
           //dd($orderdetais);
    }

    public function orderInvoice(Request $request,$id=null)
    {
        //   dd($id);
           $orders=Order::with('users','status','additionalCharges')->where('id',$id)->first();
           $transaction_amount=$orders['additionalCharges'][0]['amount'];
           $total_amount=$orders['total_amount'];
           $additinal_charges=$transaction_amount-$total_amount;
           $orderdetails=orderDetails::with('products','products.productImage')->where('order_id',$id)->get();
           $status=Status::get();
           $pdf = PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadView('admin.invoice.invoice',compact('orders','orderdetails','status','additinal_charges','transaction_amount'));
         return $pdf->download($orders['order_no'].'.pdf');

    }
}
