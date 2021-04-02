<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\CMSModel;
use Image;
class CMSController extends Controller
{
   
    public function __construct()
    {
        $this->middleware('CheckSession');
    }

    /**
     * Add Static page 
     * @method addStaticPage
     * @param null
     */
    public function addStaticPage(Request $request)
    {
        if($request->isMethod('post')){
            $validatedData = $request->validate([
                'title' => 'required',
                'slug' => 'required',
                'description' => 'required',
            ]);

            $data=$request->all();
          
            if($request->hasFile('page_image')){
                $image = $request->file('page_image');
                $bannerimageName = $request->slug.'.'.$image->getClientOriginalExtension();
                $image_resize = Image::make($image->getRealPath()); 
                
                $height = Image::make($image)->height();
                $width = Image::make($image)->width(); 

                if($width>$height)
        
                {  
                    $image_resize->resize(1400, null, function ($constraint) use($image_resize){
                        $constraint->aspectRatio();
                    })->save(public_path('pages/images/'.$bannerimageName));
                    
                 }else{
                    $image_resize->resize(null, 400, function ($constraint) use($image_resize){
                        $constraint->aspectRatio();
                    })->save(public_path('pages/images/'.$bannerimageName));
                 }
                $data['page_image']=$bannerimageName;
            }
            CMSModel::Create($data);
        }
       return view('admin.cms.addPage');
    }
    /**
     * View static page
     * @method viewstaticPage
     * @param null
     */
    public function index(Request $request)
    {
        $data= CMSModel::all();
        return view('admin.cms.viewPage',compact('data'));
    }
    /**
     * Edit & update CMS page detail
     * @method editCMS
     * @param page_id
     */
    public function editCMS(Request $request,$id=null)
    {
        if($request->isMethod('post')){
            $validatedData = $request->validate([
                'title' => 'required',
                'slug' => 'required',
                'description' => 'required',
            ]);

            $data=collect($request->all())->except('_token');
            $data= $data->toArray();
            if($request->hasFile('page_image')){
                $image = $request->file('page_image');
                $bannerimageName = $request->slug.'.'.$image->getClientOriginalExtension();
                $image_resize = Image::make($image->getRealPath()); 
                
                $height = Image::make($image)->height();
                $width = Image::make($image)->width(); 

                if($width>$height)
        
                {  
                    $image_resize->resize(1400, null, function ($constraint) use($image_resize){
                        $constraint->aspectRatio();
                    })->save(public_path('/pages/images/'.$bannerimageName));
                    
                 }else{
                    $image_resize->resize(null, 400, function ($constraint) use($image_resize){
                        $constraint->aspectRatio();
                    })->save(public_path('/pages/images/'.$bannerimageName));
                 }
                $data['page_image']=$bannerimageName;
            }
           
            $update = CMSModel::where('id',$id)->update($data);
            if($update){
                return redirect('/admin/cmspages')->with('success','Data updated successful');
            }

        }
        
        $page= CMSModel::where('id',$id)->first();
       
        return view('admin.cms.editPage',compact('page'));
    }
    /**
     * Delete page
     * @method deletePage
     * @param page id
     */
    public function deletePage($id=null)
    {
        $deleted = CMSModel::where('id',$id)->delete();
            if($deleted){
                return redirect('/admin/cmspages')->with('success','Data deleted successful');
            }
    }

}
