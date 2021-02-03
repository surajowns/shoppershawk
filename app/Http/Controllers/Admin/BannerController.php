<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\BannerModel;
use Validator;
use DB;
use File;
use Image;
class BannerController extends Controller
{
    public function __construct()
    {
        $this->middleware('CheckSession');
    }
       /**
     * View static page
     * @method viewstaticPage
     * @param null
     */
    public function index(Request $request)
    {
        $data= BannerModel::all();
        return view('admin.banner.view',compact('data'));
    }

      /**
     * Add Static page 
     * @method addStaticPage
     * @param null
     */
    public function addbanner(Request $request)
    {
        if($request->isMethod('post')){
            $validatedData = $request->validate([
                'title' => 'required',
                'banner_image'=>'required',
            ]);

            $data=$request->all();
            if($file = $request->hasFile('banner_image')){
                $file = $request->file('banner_image');
                $fileName = uniqid('banner')."".$file->getClientOriginalName();
                $file->move(public_path('/banner/'),$fileName);
                $data['banner_image'] = $fileName;
            }
            BannerModel::Create($data);
            return redirect('admin/banner')->with('success','Banner added successful');
        }
       return view('admin.banner.add');
    }

     /**
     * Edit & update Banner page detail
     * @method editbanner
     * @param page_id
     */
    public function editbanner(Request $request,$id=null)
    {
        if($request->isMethod('post')){
            $validatedData = $request->validate([
                'title' => 'required'
            ]);
           try{
            $data=$request->except('_token');
             
            $details=BannerModel::where('id',$id)->first();
                if($file = $request->hasFile('banner_image')){
                    $file = $request->file('banner_image');
                    $fileName = uniqid('banner')."".$file->getClientOriginalName();
                    $file->move(public_path('/banner/'),$fileName);
                    $data['banner_image'] = $fileName;
                    $removeimage=('/public/banner/'.$details->banner_image);
                    if($details->banner_image){
                        File::delete($removeimage);
                    }
                }

           
            $update =BannerModel::where('id',$id)->update($data);
            if($update){
                return redirect('/admin/banner')->with('success','Data updated successful');
            }
        }catch(\Exception $e){
            return redirect('admin/banner/edit-banner/'.$id)->with('error',$e->getMessage());
        }
        }
        
        $page= BannerModel::where('id',$id)->first();
       
        return view('admin.banner.edit',compact('page'));
    }
    /**
     * Delete page
     * @method deletePage
     * @param page id
     */
    public function deletebanner($id=null)
    {
        $deleted = BannerModel::where('id',$id)->delete();
            if($deleted){
                return redirect('/admin/banner')->with('success','Data deleted successful');
            }
    }
}
