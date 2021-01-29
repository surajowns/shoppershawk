<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\User;
use App\Role;
use File;
use Image;
use App\LoginLogModel;

class CommonController extends Controller
{
    public function __construct()
    {
        $this->middleware('CheckSession');
    }
    /**
     * Update Status 
     * @method updateStatus
     * @param table_name,primarykey,currentStatus
     */
    public function updateStatus($table_name=null,$primaryKey,$current_status)
    {   
        // dd($current_status,$table_name,$primaryKey);
        if($table_name !='' && $primaryKey !='' && $current_status !=''){
            $status = $current_status==1?0:1;
            $result= DB::table($table_name)->where('id',$primaryKey)->update(['status'=>$status]);
            if($result){
                return back()->with('success','Status updated');
            }else{
                return back()->with('error','something went wrong');
            }
        }
       
    }
    public function index(Request $request)
    {
        $data= User::with('roles')->where('role','!=',2)->get()->toArray();
        
        return view('admin.adminusers.view',compact('data'));
    }

      /**
     * Add user 
     * @method addUser
     * @param null
     */
    public function addUser(Request $request)
    {
        if($request->isMethod('post')){
            $validatedData = $request->validate([
                'name' => 'required',
                'role' => 'required',
                'email' => 'required|unique:users',
                'mobile' => 'required|unique:users',
                'password' => 'required',
                'location' => 'required',
                'profile_image'=>'required',
            ]);

            $data=$request->all();
            $data['password']=bcrypt($request->password);
            if($request->hasFile('profile_image')){
                $image = $request->file('profile_image');
                $name = time().'.'.$image->getClientOriginalExtension();
                $destinationPath = public_path('/admin/images');
                $image->move($destinationPath, $name);
                $data['profile_image']=$name;
            }
            User::Create($data);
            return back()->with('success','User added successful');
        }
       $role=Role::get();
       return view('admin.adminusers.add',compact('role'));
    }

     /**
     * Edit & update Banner page detail
     * @method editbanner
     * @param page_id
     */
    public function editUser(Request $request,$id=null)
    {
        if($request->isMethod('post')){
            $validatedData = $request->validate([
                'name' => 'required',
                'role' => 'required',
                'email' => 'required',
                'mobile' => 'required',
                // 'password' => 'required',
                'location' => 'required',
            ]);

            $data=$request->except('_token');

                $check1=User::where('id','!=',$id)->where('email',$request->email)->get()->toArray();
                if(!empty($check1)){
                     return back()->with('error','The email has already been taken');
                 }

                $check2=User::where('id','!=',$id)->where('mobile',$request->mobile)->get()->toArray();
                if(!empty($check2)){
                    return back()->with('error','The mobile has already been taken');
                }
               
            if($request->hasFile('profile_image')){
                $image = $request->file('profile_image');
                $name = time().'.'.$image->getClientOriginalExtension();
                $destinationPath = public_path('/admin/images');
                $image->move($destinationPath, $name);
                $data['profile_image']=$name;
            }
            $update =User::where('id',$id)->update($data);
            if($update){
                return back()->with('success','Data updated successful');
            }

        }
        
        $role=Role::get();
        $page=User::where('id',$id)->first();
        return view('admin.adminusers.edit',compact('page','role'));
    }
    /**
     * Delete page
     * @method deletePage
     * @param page id
     */
    public function deleteUser($id=null)
    {
        $deleted =User::where('id',$id)->delete();
            if($deleted){
                return back()->with('success','Data deleted successful');
            }
    }

    public function Users(Request $request)
    {
        $data= User::with('roles')->where('role',2)->orderBy('id','DESC')->get()->toArray();
        return view('admin.users.view',compact('data'));
    }

    public function Userlogs(Request $request)
    {
        $logs=LoginLogModel::orderBy('id','DESC')->get();
        return view('admin.logs.index',compact('logs'));
    }
}
