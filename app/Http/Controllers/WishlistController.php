<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Wishlist;
use App\Product;

class WishlistController extends Controller
{
    public function __construct()
    {
        $this->middleware('UserSession');
    }
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
    public function CreateandUpdate(Request $request,$product_id=null)
    {  
       $user=Auth::user();
       if(!empty($user)){
           $check=Wishlist::where('user_id',$user->id)->where('product_id',$product_id)->first();
         if(!empty($check)){
            Wishlist::where('user_id',$user->id)->where('product_id',$product_id)->delete();
            return back()->with('success', 'Remove from Wishlist');

           }
        $wishlist = new Wishlist;
        $wishlist->user_id=$user['id'];
        $wishlist->product_id=$product_id;
        $wishlist->save();
        return back()->with('success', 'Added to Wishlist');
        
        }
        else{
            return back()->with('error', 'Login first');

        }
      
    }
}
