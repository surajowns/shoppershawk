<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\CategoryModel;
use DB;
use App\ProductImage;
use Validator;
use App\BrandModel;
class ProductController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('CheckSession');
    }

    /**
     * view Products
     * @method index
     * @param null
     */
    public function index()
    {
        $data=Product::with('productBrand')->orderBy('id','DESC')->get()->toArray();
        // dd($data);
        // foreach($data as $product){
          
        //    $product['brand'] =$product['product_brand']['name'];
        // }
        //  dd($data);
        return view('admin.product.view',compact('data'));
    }

     /**
     * Add Products
     * @method addProduct
     * @param null
     */
    public function addProduct(Request $request)
    {
        if($request->isMethod('post')){
            
            $data=$request->except('_token','image');
            // dd($data);
            $validatedData = $request->validate([
                'name' => 'required',
                'brand' => 'required',
                'slug'=>'required',
                'model_no' => 'required',
                'supercategory_id'=>'required|numeric',
                'category_id'=>'required|numeric',
                'price'=>'required|numeric',
                'selling_price'=>'required|numeric',
                'specification'=>'required',
                'description'=>'required',
                'qty'=>'required|numeric',
            ]);
            // DB::beginTransaction();
            try{
                $product = new Product;
                $product->name = $request->name;
                $product->slug = $request->slug;
                $product->brand = $request->brand;
                $product->model_no = $request->model_no;
                $product->supercategory_id = $request->supercategory_id;
                $product->category_id = $request->category_id;
                $product->price = $request->price;
                $product->selling_price = $request->selling_price;
                $product->type = $request->type;        
                $product->specification = $request->specification;
                $product->description = $request->description;
                $product->qty = $request->qty;
                $product->save();

                if($request->has('image') && $request->image[0])
                {

                    $images = $request->file('image');
                    foreach($images as $image)
                    {
                     $new_name = uniqid('product_image') . '.' . $image->getClientOriginalName();
                     $image->move(public_path('product_image'), $new_name);
                    $newimage= new ProductImage;
                    $newimage->image = $new_name;
                    $newimage->product_id = $product->id;                    
                    $newimage->save(); 
                    }
                  
                }
                return redirect('admin/product')->with('success','Product Created Successfull');
                // DB::commit();  
            }catch(\Exception $e){
                    // DB::rollBack();
                    // dd($e->getMessage());
                    return redirect('admin/product/add-product')->with('error',$e->getMessage());

            }
        }
         $categories=CategoryModel::where('parent_id',0)->get();
         $type=DB::table('product_type')->get();
         $brand=DB::table('brands')->get();
         return view('admin.product.add',compact('categories','type','brand'));

    }


     /**
     * Edit Products
     * @method editProduct
     * @param null
     */
    public function editProduct(Request $request,$id=null)
    {
        if($request->isMethod('post')){
            
            $data=$request->except('_token','image');
            // dd($data);
            $validatedData = $request->validate([
                'name' => 'required',
                'brand' => 'required',
                'slug'=>'required',
                'model_no' => 'required',
                'supercategory_id'=>'required|numeric',
                'category_id'=>'required|numeric',
                'price'=>'required|numeric',
                'selling_price'=>'required|numeric',
                'specification'=>'required',
                'description'=>'required',
                'qty'=>'required|numeric',
            ]);
            // DB::beginTransaction();
            try{
               
                $product=Product::where('id',$request->id)->update($data);
     
                if($request->has('image') && $request->image[0])
                {
                    // $this->remove_images($product->images);
                    
                    if($request->has('image') && $request->image[0])
                    {
    
                        $images = $request->file('image');
                        foreach($images as $image)
                        {
                         $new_name = uniqid('product_image') . '.' . $image->getClientOriginalName();
                         $image->move(public_path('product_image'), $new_name);
                        $newimage= new ProductImage;
                        $newimage->image = $new_name;
                        $newimage->product_id = $request->id;                    
                        $newimage->save(); 
                        }
                      
                    }
                }
                return redirect('admin/product')->with('success','Product Updated Successfull');
                // DB::commit();  
            }catch(\Exception $e){
                    // DB::rollBack();
                    dd($e->getMessage());
                    return redirect('admin/add-product')->with('error',$e->getMessage());

            }
        }
         $categories=CategoryModel::where('parent_id',0)->get();
         $subcategories=CategoryModel::where('parent_id','!=',0)->get();
         $brand=DB::table('brands')->get();
         $type=DB::table('product_type')->get();
         $product=Product::where('id',$id)->first();
         $productimage=ProductImage::where('product_id',$id)->get();

        //  dd($product);
         return view('admin.product.edit',compact('categories','subcategories','type','brand','product','productimage'));
    }

    public function getCategory(Request $request,$id=null)
    {
        
        $categories=CategoryModel::where('parent_id',$id)->pluck("name","id");
        return json_encode($categories);

        
    }
     /**
     * Delete Category
     * @method deleteCategory
     * @param category id
     */
    public function deleteProduct($id=null)
    {
        $result= Product::where('id',$id)->delete();
        if($result){
            return redirect('admin/product')->with('success','Product Deleted successful');
        }

    }

    public function removeCategory($id=null)
    {
        $result=ProductImage::where('id',$id)->delete();
         return back()->with('success','Product Image Deleted successful');

    }
}
