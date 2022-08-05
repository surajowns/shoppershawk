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
use DB;
use App\Refferal;
use Str;
use App\BrandModel;

class HomeController extends Controller
{
   
    public function index(Request $request)
    {
      $categories=CategoryModel::where('parent_id',0)->where('status',1)->get();
      $subcategories=CategoryModel::where('parent_id','!=',0)->where('status',1)->get();

      return view('front.index', compact('categories','subcategories'));
    }
    public function Register(Request $request)
    {
      if($request->isMethod('post')){
          $validator = Validator::make($request->all(), [
            'name' => 'required',
            'mobile' => 'required|unique:users',
            'email' => 'required|unique:users',
            'password'=>'required',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'error' => $validator->messages()->first(),
                 'status' => 400,
            ],400);
        }

          DB::beginTransaction();
          try{
            $data=$request->except('_token');
            $password=bcrypt($request->password);
            $data['password']=$password;
            $data['role']=2;
            
            User::create($data); 
            $refferal_code=Str::random(10);
            
            $refferal_link=url("/register/reff=$refferal_code");
             $user=User::orderBy('id','DESC')->first();
             $refferals = new Refferal;
             $refferals->user_id= $user['id'];
             $refferals->referrer_id=$refferal_code;
             $refferals->link= $refferal_link;
             $refferals->save();
             DB::commit();
             UserRegisterEmail($user,$refferal_code);

            return response()->json(['success'=>'You are registered successfully']);

          }catch(\Exception $e){
             DB::rollback(); 
            return response()->json(['error'=>$e->getMessage()]);

          }

        }
        return view('front.common.register');
    }
    public function Login(Request $request)
    {
      $categories=CategoryModel::where('parent_id',0)->where('status',1)->get();
      $subcategories=CategoryModel::where('parent_id','!=',0)->where('status',1)->get();
        return view('front.common.login',compact('categories','subcategories'));
    }
    public function ProuctList(Request $request,$slug=null)
    {   
       try{
         $filter=$request->filterby;
          $user=Auth::user();
          
          if($filter){
            if(is_numeric($_GET['cat'])){
              $product=Product::with(['productImage','productRating','wishlist'=>function($query) use ($user){$query->select('*')->where('user_id',isset($user)?$user->id:'');}])->where('brand',$_GET['cat'])->orderBy('selling_price',$filter)->where('status',1)->orderBy('qty','DESC')->paginate(100);
            }
            else{
                //  dd(str_replace(' ', '', $_GET['cat']));
                if($_GET['cat']){
                   $category =CategoryModel::where('status',1)->where('slug','like','%'.$_GET['cat'].'%')->first();
                 } else{
                  $category='';
                 }
              if(!empty($category)){
                $product=Product::with(['productImage','productRating','wishlist'=>function($query) use ($user){$query->select('*')->where('user_id',isset($user)?$user->id:'');}])->where('supercategory_id',$category['id'])->orderBy('selling_price',$filter)->where('status',1)->orderBy('qty','DESC')->paginate(100);
                // dd( $product);
              }else{
                  // dd(Session::get('keywords'));
                $product=Product::with(['productImage','productRating','wishlist'=>function($query) use ($user){$query->select('*')->where('user_id',isset($user)?$user->id:'');}])->where('name','like','%'.$_GET['keywords'].'%')->orderBy('selling_price',$filter)->where('status',1)->orderBy('qty','DESC')->paginate(100);
                // dd($product);
              }
            
            }
            if(isset($_GET['subcat'])){
              
              $categ=CategoryModel::where('status',1)->where('slug',$_GET['cat'])->first();
              $subcategory =CategoryModel::where('status',1)->where('parent_id',$categ['id'])->where('slug','like','%'.$_GET['subcat'].'%')->first();              //  dd($subcategory);
              $product=Product::with(['productImage','productRating','wishlist'=>function($query) use ($user){$query->select('*')->where('user_id',isset($user)?$user->id:'');}])->where('supercategory_id',$subcategory['parent_id'])->where('category_id',$subcategory['id'])->orderBy('selling_price',$filter)->where('status',1)->orderBy('qty','DESC')->paginate(100);
           
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
          if($request->cat && $request->keywords ){
               Session::put('cat',$request->cat);
               Session::put('keywords',$request->keywords);
               $category =CategoryModel::where('status',1)->where('slug',$request->cat)->where('parent_id',0)->first();
              $product=Product::with(['productImage','productRating','wishlist'=>function($query) use ($user){$query->select('*')->where('user_id',isset($user)?$user->id:'');}])->where('supercategory_id',$category['id'])->orWhere('slug','like' ,'%'.$request->keywords.'%')->orWhere('name','like','%'.$request->keywords.'%')->orWhere('model_no','like','%'.$request->keywords.'%')->where('status',1)->orderBy('qty','DESC')->paginate(100);
            }
          else{
            // dd($request->keywords);  
            Session::put('keywords',$request->keywords);          
            $product=Product::with(['productImage','productRating','wishlist'=>function($query) use ($user){$query->select('*')->where('user_id',isset($user)?$user->id:'');}])->orWhere('slug','like' ,'%'.$request->keywords.'%')->orWhere('name','like','%'.$request->keywords.'%')->orWhere('model_no','like','%'.$request->keywords.'%')->orWhere('description','like','%'.$request->keywords.'%')->where('status',1)->orderBy('qty','DESC')->paginate(100);
          }
          if(is_numeric($_GET['cat'])){
            $product=Product::with(['productImage','productRating','wishlist'=>function($query) use ($user){$query->select('*')->where('user_id',isset($user)?$user->id:'');}])->where('brand',$_GET['cat'])->where('status',1)->paginate(100);
          }else{
            
            $keywords=$request->keywords;
            if($keywords){
              
              if($request->cat){
                Session::put('cat',$request->cat);
                Session::put('keywords',$request->keywords);
                $category =CategoryModel::where('status',1)->where('id',$request->cat)->first();
                $product=Product::with(['productImage','productRating','wishlist'=>function($query) use ($user){$query->select('*')->where('user_id',isset($user)?$user->id:'');}])->where('supercategory_id',$request->cat)->where('slug','like', '%'.$keywords.'%')->where('name','like','%'.$keywords.'%')->where('model_no','like','%'.$keywords.'%')->orWhere('description','like','%'.$request->keywords.'%')->where('status',1)->orderBy('qty','DESC')->paginate(100);
              
              }else{
                  $product=Product::with(['productImage','productRating','wishlist'=>function($query) use ($user){$query->select('*')->where('user_id',isset($user)?$user->id:'');}])->orWhere('slug','like','%'.$keywords.'%')->orWhere('name','like','%'.$keywords.'%')->orWhere('model_no','like','%'.$keywords.'%')->orWhere('description','like','%'.$request->keywords.'%')->where('status',1)->orderBy('qty','DESC')->paginate(100);
                }
                }else{
                  $category =CategoryModel::where('status',1)->where('slug','like','%'.$_GET['cat'].'%')->first();
                  $product=Product::with(['productImage','productRating','wishlist'=>function($query) use ($user){$query->select('*')->where('user_id',isset($user)?$user->id:'');}])->where('status',1)->where('supercategory_id',isset($category['id'])?$category['id']:'')->orWhere('slug','like','%'.$_GET['cat'].'%')->orWhere('name','like','%'.$_GET['cat'].'%')->orWhere('model_no','like','%'.$_GET['cat'].'%')->orderBy('qty','DESC')->paginate(100);
                }
          }
          if(isset($_GET['subcat'])){
            
              $categ=CategoryModel::where('status',1)->where('slug',$_GET['cat'])->first();
              $subcategory =CategoryModel::where('status',1)->where('parent_id',$categ['id'])->where('slug','like','%'.$_GET['subcat'].'%')->first();
              $product=Product::with(['productImage','productRating','wishlist'=>function($query) use ($user){$query->select('*')->where('user_id',isset($user)?$user->id:'');}])->where('status',1)->where('supercategory_id',$subcategory['parent_id'])->where('category_id',$subcategory['id'])->orderBy('qty','DESC')->paginate(100);
          }
        $category =CategoryModel::where('status',1)->where('parent_id',0)->get();
        $i=0;foreach($category as $cat){
        $category[$i]['subcat']=CategoryModel::where('status',1)->where('parent_id',$cat['id'])->get();
        $i++;
        }
        $singleaddbanner=BannerModel::where('status',1)->where('type',2)->first();
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
       $lastview=array();
        $product_id=Product::where('slug',$slug)->where('status',1)->pluck('id')->toArray();
        
        array_unshift($lastview,implode($product_id));

       Session::push('last',$lastview);
     
      $product=Product::with(['productImage','wishlist','productRating'=>function($query){$query->select('*')->where('status',1);},'productRating.users'])->where('slug',$slug)->where('status',1)->first();
      if($product)
    {
      $relatedproducts=Product::with(['productImage','productRating','wishlist'=>function($query) use ($user){$query->select('*')->where('user_id',isset($user)?$user->id:'');}])->where('supercategory_id',$product['supercategory_id'])->where('status',1)->where('qty','!=',0)->get()->toArray();
      return view('front.common.productdetails',compact('product','relatedproducts'));
    }else{
        return redirect('/');
    }

    }
    public function Search(Request  $request)
    {       
        $supcategory =CategoryModel::where('status',1)->where('slug','like',$request->keywords.'%')->where('parent_id',0)->pluck('id')->toArray();
        $category =CategoryModel::where('status',1)->where('slug','like',$request->keywords.'%')->where('parent_id','!=',0)->pluck('id')->toArray();
        $brands =BrandModel::where('status',1)->where('name','like',$request->keywords.'%')->pluck('id')->toArray();
    
        if($request->cat){
           $subcategory =CategoryModel::where('status',1)->where('slug',$request->cat)->first();
           $result=Product::with('category')->where('supercategory_id',$subcategory['parent_id'])->where('name','like',$request->keywords.'%')->orWhere('model_no','like',$request->keywords.'%')->orWhere('description','like','%'.$request->keywords.'%')->where('status',1)->get();
         }
         elseif(!empty($brands || $supcategory || $category )){
            $result=Product::whereIn('brand',[implode(',',$brands)])->orWhereIn('supercategory_id',[implode(',',$supcategory)])->orWhereIn('category_id',[implode(',',$category)])->where('status',1)->get();
         }        
        else{
           $result=Product::with('category')->where('name','like','%'.$request->keywords.'%')->orWhere('slug','like','%'.$request->keywords.'%')->orWhere('model_no','like','%'.$request->keywords.'%')->where('status',1)->get();

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

      public function ContactUs(Request $request)
      {
          

          if ($request->isMethod('post')) {
              $validator = Validator::make($request->all(), [
                      'email' => 'required',
                      'name'	=> 'required',
                      'contact_no'	=> 'required',
              ]);
               

         try{
              $data=$request->except('_token');
              DB::table('inquiry')->insert($data);
              return back()->with(['success'=>"We will contact you soon"]);

            }catch(\Exception $e){
                return back()->with(['error'=>$e->getMessage()]);
           }
        }
        return view('front.common.contactus');
     }

     public function mobileCategory(Request $request)
     {     
           $category =CategoryModel::where('status',1)->where('parent_id',0)->get();
           $subcategories=CategoryModel::where('parent_id','!=',0)->where('status',1)->get();

           return view('front.pages.mobilecategory',compact('category','subcategories'));
     }


}
