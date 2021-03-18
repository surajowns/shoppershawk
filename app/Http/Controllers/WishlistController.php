<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Wishlist;
use App\Product;

class WishlistController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('UserSession');
    // }
    public function Index(Request $request)
    {  
        $user=Auth::user();
        if(!empty($user)){
        $product_id=Wishlist::where('user_id',$user->id)->pluck('product_id');
       
        $products=Product::with('productImage')->where('status',1)->whereIn('id',$product_id)->get()->toArray();
        return view('front.common.wishlist',compact('products'));
        }
        else{

            return back()->with('error', 'Login first');
        }
    }
    public function CreateandUpdate(Request $request)
    {  

        $product_id=$request->productid;
       $user=Auth::user();
       if(!empty($user)){
           $check=Wishlist::where('user_id',$user['id'])->where('product_id',$product_id)->first();
         if(!empty($check)){
            Wishlist::where('user_id',$user['id'])->where('product_id',$product_id)->delete();
            $totalwishlist=Wishlist::where('user_id',$user['id'])->get()->count();

            return response()->json(array('status'=>'remove','totalwishlist'=>$totalwishlist,'message'=>'Remove from Wishlist','remoclass'=>'ion-android-favorite-outline'));

           }
          
        $wishlist = new Wishlist;
        $wishlist->user_id=$user['id'];
        $wishlist->product_id=$product_id;
        $wishlist->save();
        $totalwishlist=Wishlist::where('user_id',$user['id'])->get()->count();

        return response()->json(array('status'=>'add','totalwishlist'=>$totalwishlist,'message'=>'Added to Wishlist','adclass'=>'ion-android-favorite'));
        
        }
        else{
            return response()->json(array('status'=>'not_login'));

        }
      
    }
}
