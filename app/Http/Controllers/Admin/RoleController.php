<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Role;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('CheckSession');
    }
    
    /**
     *  get role
     * @method index
     * @param null
     */
    public function index(Request $request)
    {
          $data=Role::get();
          return view('admin.role.index',compact('data'));
    }


     /**
     * Add Role 
     * @method addStaticPage
     * @param null
     */
    public function addRole(Request $request)
    {
        if($request->isMethod('post')){
            $validatedData = $request->validate([
                'name' => 'required',
              
            ]);

            $data=$request->all();
        //    dd($data);
            Role::Create($data);
            return redirect('admin/role')->with('success','Role added successful');
        }
       return view('admin.role.add');
    }


      /**
     * Edit Role
     * @method editRole
     * @param null
     */
    public function editRole(Request $request,$id=null)
    {
        if($request->isMethod("post")){
             
            $validateData=$request->validate([
            'name'=>'required',
            ]);
            try{
                $data=$request->except('_token');

                $rating=Role::where('id',$id)->update($data);
                return redirect('admin/role')->with('success','Role Updated Successfull');

            }
            catch(\Exception $e){
                return redirect('admin/role/edit-role/'.$id)->with('error',$e->getMessage());
            }
        }
        $editData=Role::where('id',$id)->first();
        return view('admin.role.edit',compact('editData'));
    }


    public function deleteRole($id=null)
    {
        $result=Role::where('id',$id)->delete();
        if($result){
            return redirect('admin/role')->with('success','Role Updated Successfull');

        }
    }
}
