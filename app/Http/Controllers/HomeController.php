<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\CategoryModel;
use Validator,Redirect,Response;
use App\User;
use Auth;

class HomeController extends Controller
{
    public function index(Request $request)
    {
         return view('front.index');
    }
    public function Register(Request $request)
    {
      if($request->isMethod('post')){
        $validatedData = $request->validate([
          'name' => 'required',
          'email' => 'required|unique:users',
          'mobile' => 'required|unique:users',
          'password'=>'required',
          ]);
          try{
            $data=$request->except('_token');
            $password=bcrypt($request->password);
            $data['password']=$password;
            $data['role']=2;
            
            User::create($data); 
            return redirect('/home')->with('success','You are registered successfully');

          }catch(\Exception $e){
            dd($e->getMessage());
            return back()->with('error',$e->getMessage());

          }

        }
        return view('front.common.register');
    }
    public function Login(Request $request)
    {
        return view('front.common.login');
    }
    public function ProuctList(Request $request,$slug=null)
    {   
        $user=Auth::user();
          if(is_numeric($_GET['cat'])){
            $product=Product::with(['productImage','productRating','wishlist'=>function($query) use ($user){$query->select('*')->where('user_id',isset($user)?$user->id:'');}])->where('brand',$_GET['cat'])->where('status',1)->paginate(32);

          }
        else{
            $category =CategoryModel::where('status',1)->where('slug',$_GET['cat'])->first();
            $product=Product::with(['productImage','productRating','wishlist'=>function($query) use ($user){$query->select('*')->where('user_id',isset($user)?$user->id:'');}])->where('supercategory_id',$category['id'])->where('status',1)->paginate(32);
          }
          if(isset($_GET['subcat'])){
             $subcategory =CategoryModel::where('status',1)->where('slug',$_GET['subcat'])->first();
             $product=Product::with(['productImage','productRating','wishlist'=>function($query) use ($user){$query->select('*')->where('user_id',isset($user)?$user->id:'');}])->where('supercategory_id',$category['id'])->where('category_id',$subcategory['id'])->where('status',1)->paginate(32);
          }
        $category =CategoryModel::where('status',1)->where('parent_id',0)->get();
        $i=0;foreach($category as $cat){
        $category[$i]['subcat']=CategoryModel::where('status',1)->where('parent_id',$cat['id'])->get();
        $i++;
        }
        if(isset($_GET['cat'])){
          return view('front.common.productlist',compact('product','category'));

        }else{
          return view('errors.404');
        }
    }
    public function ProuctDetails(Request $request,$slug=null)
    {

      $user=Auth::user();
      $product=Product::with('productImage','wishlist','productRating')->where('slug',$slug)->where('status',1)->first();
      $relatedproducts=Product::with(['productImage','productRating','wishlist'=>function($query) use ($user){$query->select('*')->where('user_id',isset($user)?$user->id:'');}])->where('supercategory_id',$product['supercategory_id'])->where('status',1)->get()->toArray();
      return view('front.common.productdetails',compact('product','relatedproducts'));

    }
    public function Search(Request  $request)
    {       

       if($request->cat){
         $result=Product::with('category')->where('supercategory_id',$request->cat)->where('name','like','%'.$request->keywords.'%')->get();
          }
          else{
           $result=Product::with('category')->where('name','like','%'.$request->keywords.'%')->get();
 
          }
          //dd($result);
          return response()->json($result);
    }
}
