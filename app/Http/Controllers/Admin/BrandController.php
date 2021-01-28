<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\BrandModel;
use File;

class BrandController extends Controller
{
    public function __construct()
    {
        $this->middleware('CheckSession');
    }
    
    public function Index(Request $request)
    {
        $brand=BrandModel::orderBy('id','DESC')->get();
        return view('admin.brand.index',compact('brand'));

    }
    public function addBrand(Request $request)
    {
        if($request->isMethod('post')){
          

            $validatedData = $request->validate([
                'name' => 'required',
                'images'=> 'required',
            ]);

    
            try{

                $data= $request->all();
        
                if($file = $request->hasFile('images')){
                $file = $request->file('images');
                $fileName = uniqid('brand')."".$file->getClientOriginalName();
                $file->move(public_path('/category/'),$fileName);
                $data['image'] = $fileName;
                }
              
                BrandModel::Create($data);
                return redirect('admin/brand')->with('success','Brand added successful');
            }catch(\Exception $e){
                return redirect('admin/brand/add-brand')->with('error',$e->getMessage());
            }
        }
        return view('admin.brand.add');
    }
     /**
     * Edit and update Category
     * @method editCategory
     * @param category id 
     */
    public function editBrand(Request $request,$id=null)
    {  
        if($request->isMethod('post')){
            print_r($request->all());

            $validatedData = $request->validate([
                'name' => 'required',
            ]);
            try{
                $data= collect($request->all())->except('_token');
                $details=BrandModel::where('id',$id)->first();
            //    echo $details->image;
                if($file = $request->hasFile('image')){
                    // dd('dd');
                    $file = $request->file('image');
                    $fileName = uniqid('brand')."".$file->getClientOriginalName();
                    $file->move(public_path('/category/'),$fileName);
                    $data['image'] = $fileName;
                    $removeimage=('/public/category/'.$details->image);
                    if($details->image){
                     
                        File::delete($removeimage);
                    }

                  
                    }
                $data= $data->toArray();
              
               
                BrandModel::where('id',$id)->update($data);
                return redirect('admin/brand')->with('success','Brand updated successful');
            }catch(\Exception $e){
                return redirect('admin/brand/edit-brand/'.$id)->with('error',$e->getMessage());
            }
        }
        $editData=BrandModel::where('id',$id)->first(); 
        return view('admin.brand.edit',compact('editData'));
    }
    /**
     * Delete Category
     * @method deleteCategory
     * @param category id
     */
    public function deleteBrand($id=null)
    {
        $result= BrandModel::where('id',$id)->delete();
        if($result){
            return redirect('admin/brand')->with('success','Brand Deleted successful');
        }

    }

}
