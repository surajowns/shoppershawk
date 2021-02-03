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
            if($request->hasFile('banner_image')){
                $image = $request->file('banner_image');
                $bannerimageName =uniqid().'_'.date('Ymd').'.'.$image->getClientOriginalExtension();
                $image_resize = Image::make($image->getRealPath()); 
                $height = Image::make($image)->height();
                $width = Image::make($image)->width(); 

                if($width>$height)
        
                {  
                    $image_resize->resize(1400, null, function ($constraint) use($image_resize){
                        $constraint->aspectRatio();
                    })->save(public_path('/banner/'.$bannerimageName));
                    
                 }else{
                    $image_resize->resize(null, 400, function ($constraint) use($image_resize){
                        $constraint->aspectRatio();
                    })->save(public_path('/banner/'.$bannerimageName));
                 }
                $data['banner_image']=$bannerimageName;
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

            $data=$request->except('_token');
            // $data= $data->toArray();
            if($request->hasFile('banner_image')){
                $image = $request->file('banner_image');
                $bannerimageName =$image->getClientOriginalExtension();
                $image_resize = Image::make($image->getRealPath()); 
                
                $height = Image::make($image)->height();
                $width = Image::make($image)->width(); 

                if($width>$height)
        
                {  
                    $image_resize->resize(1400, null, function ($constraint) use($image_resize){
                        $constraint->aspectRatio();
                    })->save(public_path('/banner/'.$bannerimageName));
                    
                 }else{
                    $image_resize->resize(null, 400, function ($constraint) use($image_resize){
                        $constraint->aspectRatio();
                    })->save(public_path('/banner/'.$bannerimageName));
                 }
                $data['banner_image']=$bannerimageName;
            }
           
            $update =BannerModel::where('id',$id)->update($data);
            if($update){
                return redirect('/admin/banner')->with('success','Data updated successful');
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
