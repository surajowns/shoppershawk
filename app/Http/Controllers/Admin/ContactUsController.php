<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use DB;
class ContactUsController extends Controller
{

    public function __construct()
    {
        $this->middleware('CheckSession');
    }
    public function Index(Request $request)
    {
      $data=DB::table('inquiry')->orderBy('id','DESC')->get();
      //dd($data);
      return view('admin.contactus.index',compact('data'));   
    }
    public function deleteenquiry($id=null)
    {
        $deleted = DB::table('inquiry')->where('id',$id)->delete();
            if($deleted){
                return redirect('/admin/contactus')->with('success','Data deleted successful');
            }
    }


}
