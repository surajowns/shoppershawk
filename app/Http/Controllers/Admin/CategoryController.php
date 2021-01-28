<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\CategoryModel;
use Validator;
use File;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('CheckSession');
    }
    
    public function index(Request $request)
    {
        $categories = CategoryModel::all();
        return view('admin.category.index',compact('categories'));
    }

    /**
     * Add category
     * @method AddCategory
     * @params null
     */
    public function addCategory(Request $request)
    {
        if($request->isMethod('post')){
          
        //    dd($request->all());

            $validatedData = $request->validate([
                'name' => 'required',
                'slug' => 'required',
                'images'=> 'required',
            ]);

    
            try{

                $data= $request->all();
            //    dd($data);
                if($file = $request->hasFile('images')){
                $file = $request->file('images');
                $fileName = uniqid('category')."".$file->getClientOriginalName();
                $file->move(public_path('/category/'),$fileName);
                $data['image'] = $fileName;
                }
                //   dd($data);
                if($request->filled('parent_id')){
                    $parent_id=$request->parent_id;
                }else{
                    $parent_id=0;
                }
                $data['parent_id']=$parent_id;
                CategoryModel::Create($data);
                return redirect('admin/category')->with('success','Category added successful');
            }catch(\Exception $e){
                return redirect('admin/category/add-category')->with('error',$e->getMessage());
            }
        }
        $categories = CategoryModel::where('status',1)->where('parent_id',0)->get();
        // dd($categories);
        return view('admin.category.add',compact('categories'));
    }
     /**
     * Edit and update Category
     * @method editCategory
     * @param category id 
     */
    public function editCategory(Request $request,$id=null)
    {  
        if($request->isMethod('post')){
            // print_r($request->all());

            $validatedData = $request->validate([
                'name' => 'required',
                'slug' => 'required',
            ]);
            try{
                $data= collect($request->all())->except('_token');
                $details=CategoryModel::where('id',$id)->first();
            //    echo $details->image;
                if($file = $request->hasFile('image')){
                    // dd('dd');
                    $file = $request->file('image');
                    $fileName = uniqid('category')."".$file->getClientOriginalName();
                    $file->move(public_path('/category/'),$fileName);
                    $data['image'] = $fileName;
                    $removeimage=('/public/category/'.$details->image);
                    if($details->image){
                        // echo =
                        File::delete($removeimage);
                    //    unlink($removeimage);
                    }

                    //  if (file_exists($path_user.$path)) {
                    //     unlink($path_user.$path);
                    //  }
                   
                    }


// dd($data);
                $data= $data->toArray();
                if($request->filled('parent_id')){
                    $parent_id=$request->parent_id;
                }else{
                    $parent_id=0;
                }
                $data['parent_id']=$parent_id;
               
                CategoryModel::where('id',$id)->update($data);
                return redirect('admin/category')->with('success','Category updated successful');
            }catch(\Exception $e){
                return redirect('admin/category/edit/'.$id)->with('error',$e->getMessage());
            }
        }
        $editData=CategoryModel::where('id',$id)->first(); 
        $categories = CategoryModel::where('status',1)->where('parent_id',0)->get();
        return view('admin.category.edit',compact('categories','editData'));
    }
    /**
     * Delete Category
     * @method deleteCategory
     * @param category id
     */
    public function deleteCategory($id=null)
    {
        $result= CategoryModel::where('id',$id)->delete();
        if($result){
            return redirect('admin/category')->with('success','Category Deleted successful');
        }

    }
}
