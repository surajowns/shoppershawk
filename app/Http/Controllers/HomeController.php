<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\CategoryModel;
use Validator,Redirect,Response;
use App\User;
use Auth;
use App\CouponModel;
use Cart;
use Session;
use App\CMSModel;
use App\BannerModel;

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
       try{
         $filter=$request->filterby;
        $user=Auth::user();
          if($filter){
            if(is_numeric($_GET['cat'])){
              $product=Product::with(['productImage','productRating','wishlist'=>function($query) use ($user){$query->select('*')->where('user_id',isset($user)?$user->id:'');}])->where('brand', 'like','%'. $_GET['cat'].'%')->orderBy('selling_price',$filter)->where('status',1)->paginate(32);
  
            }
          else{
              $category =CategoryModel::where('status',1)->where('slug','like','%'.$_GET['cat'].'%')->first();
              $product=Product::with(['productImage','productRating','wishlist'=>function($query) use ($user){$query->select('*')->where('user_id',isset($user)?$user->id:'');}])->where('supercategory_id',$category['id'])->orderBy('selling_price',$filter)->where('status',1)->paginate(32);
            }
            if(isset($_GET['subcat'])){
               $subcategory =CategoryModel::where('status',1)->where('slug','like','%'.$_GET['subcat'].'%')->first();
               $product=Product::with(['productImage','productRating','wishlist'=>function($query) use ($user){$query->select('*')->where('user_id',isset($user)?$user->id:'');}])->where('supercategory_id',$category['id'])->where('category_id',$subcategory['id'])->orderBy('selling_price',$filter)->where('status',1)->paginate(32);
            }
            $category =CategoryModel::where('status',1)->where('parent_id',0)->get();
            $i=0;foreach($category as $cat){
            $category[$i]['subcat']=CategoryModel::where('status',1)->where('parent_id',$cat['id'])->get();
            $i++;
            }
            $singleaddbanner=BannerModel::where('type',2)->first();
            if(isset($_GET['cat'])){
              return view('front.common.productlist',compact('product','category','singleaddbanner'));
    
            }else{
              return view('errors.404');
            }
          }


          if(is_numeric($_GET['cat'])){
            $product=Product::with(['productImage','productRating','wishlist'=>function($query) use ($user){$query->select('*')->where('user_id',isset($user)?$user->id:'');}])->where('brand', 'like','%'. $_GET['cat'].'%')->where('status',1)->paginate(32);

          }
        else{
            $category =CategoryModel::where('status',1)->where('slug','like','%'.$_GET['cat'].'%')->first();
            $product=Product::with(['productImage','productRating','wishlist'=>function($query) use ($user){$query->select('*')->where('user_id',isset($user)?$user->id:'');}])->where('supercategory_id',$category['id'])->where('status',1)->paginate(32);
          }
          if(isset($_GET['subcat'])){
             $subcategory =CategoryModel::where('status',1)->where('slug','like','%'.$_GET['subcat'].'%')->first();
             $product=Product::with(['productImage','productRating','wishlist'=>function($query) use ($user){$query->select('*')->where('user_id',isset($user)?$user->id:'');}])->where('supercategory_id',$category['id'])->where('category_id',$subcategory['id'])->where('status',1)->paginate(32);
          }
        $category =CategoryModel::where('status',1)->where('parent_id',0)->get();
        $i=0;foreach($category as $cat){
        $category[$i]['subcat']=CategoryModel::where('status',1)->where('parent_id',$cat['id'])->get();
        $i++;
        }
        $singleaddbanner=BannerModel::where('type',2)->first();
        if(isset($_GET['cat'])){
          return view('front.common.productlist',compact('product','category','singleaddbanner'));

        }else{
          return view('errors.404');
        }
      }catch(\Exception $e){
          return view('errors.404');
      }
    }

    public function Filterprice(Request $request)
    {
      
    }
    public function ProuctDetails(Request $request,$slug=null)
    {

      $user=Auth::user();
      $product=Product::with(['productImage','wishlist','productRating'=>function($query){$query->select('*')->where('status',1);},'productRating.users'])->where('slug',$slug)->where('status',1)->first();
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
          return response()->json($result);
    }
    public function MultiSearch(Request $request)
    {
      $user=Auth::user();
      $product=Product::with(['productImage','productRating','wishlist'=>function($query) use ($user){$query->select('*')->where('user_id',isset($user)?$user->id:'');}])->where('slug','like','%'.$request->keywords.'%')->where('status',1)->get();
      return view('front.common.productlist',compact('product'));
    }

    // public function applycoupon(Request $request)
    // {
    //       $user=Auth::user();
    //       $date=Date('Y-m-d');
    //       $validator = Validator::make($request->all(), [
    //         'code'=>'required',    
    //     ]); 
    //     if ($validator->fails()) {
    //         return back()->with(['error'=>$validator->messages()->first()]);

    //     }
    //  $coupon=CouponModel::where('code',$request->code)->where('starting_at','<=',$date)->where('end_at','>=',$date)->where('status',1)->first();
    // //  dd($coupon);
    
    //  if($coupon == null){
    //     return back()->with(['error'=>"Invalid Coupon"]);
    //    }
    //    else{
    //     $discount=$coupon['discount'];
    //     $coupon_code=$coupon['code'];
    //    $minimum_amount=$coupon['minimum_amount'];
    //     $cartDetails=Cart::getContent()->toArray();
    //     // dd($cartDetails);
    //     $item_total=0;
    //     foreach($cartDetails as $details){
    //         $item_total= $item_total + $details['price']*$details['quantity'];            
    //       }
    //       $item_total;
    //       if($minimum_amount <= $item_total){
    //          Session::put('coupon',$coupon_code);
    //          Session::put('discount',$discount);
    //         return back()->with(['success'=>"Coupon applied successfull",'discount'=>$discount,'coupon'=>$coupon_code]);
    //       }else{
    //         return back()->with(['error'=>"Coupon not  available for this order"]);
    //       }
    //     }
    // }

    //information page
      public function Pages(Request $request,$page=null)
      {    
          $slug=$page;
          $page=CMSModel::where('slug',$slug)->first();
          return view('front.pages.informationpage',compact('page','slug'));
      }


}
