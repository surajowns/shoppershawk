<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\NotificationModel;

class NotificationController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('CheckSession');
    }
    public function index(Request $request)
    {
        $notification=NotificationModel::with('users','order')->where('trash',0)->where('status',1)->orderBy('id','DESC')->get();
        return view('admin.notification.index',compact('notification'));

    }
    public function ChangeSeen(Request $request,$id=null)
    {

        //  dd($id);
        
        NotificationModel::where('id',$id)->update(['is_seen'=>1]);
        return redirect('admin/notification'); 
    }
}
