<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\BannerModel;
use Validator;
use DB;
use File;
use Image;
use App\BannerType;
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
        $data= BannerModel::with('bannertype')->get();
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
                $fileName = uniqid('banner')."".str_replace(" ","",$file->getClientOriginalName());
                $file->move(public_path('/banner/'),$fileName);
                $data['banner_image'] = $fileName;
            }
            BannerModel::Create($data);
            return redirect('admin/banner')->with('success','Banner added successful');
        }
        $bannertype=BannerType::get();
       return view('admin.banner.add',compact('bannertype'));
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
                    $removeimage=public_path('/banner/'.$details->banner_image);
                    if($details->banner_image){
                        unlink($removeimage);
                    }
                    $file = $request->file('banner_image');
                    $fileName = uniqid('banner')."".str_replace(" ","",$file->getClientOriginalName());
                    $file->move(public_path('/banner/'),$fileName);
                    $data['banner_image'] = $fileName;
                   
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
        $bannertype=BannerType::get();

        return view('admin.banner.edit',compact('page','bannertype'));
    }
    /**
     * Delete page
     * @method deletePage
     * @param page id
     */
    public function deletebanner($id=null)
    {   
        try{
        $details=BannerModel::where('id',$id)->first();
        $removeimage=public_path('/banner/'.$details->banner_image);
        if($details->banner_image){
            unlink($removeimage);
        }
        $deleted = BannerModel::where('id',$id)->delete();
            if($deleted){
                return redirect('/admin/banner')->with('success','Data deleted successful');
            }
        }catch(\Exception $e){
            return redirect('/admin/banner/')->with('error',$e->getMessage());
        }
    }
}
