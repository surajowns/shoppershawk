<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\OrderDetails;
use App\Status;
use Auth;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('UserSession');
    }
    public function Index(Request $request)
    {
         $user=Auth::user();
         $orders=Order::with('users','status')->where('user_id',$user['id'])->orderBy('id','DESC')->get()->toArray();
         $status=Status::get();
         return view('front.common.useraccount',compact('user','orders','status'));
    }
}
