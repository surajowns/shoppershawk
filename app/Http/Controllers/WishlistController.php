<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Wishlist;

class WishlistController extends Controller
{
    public function Index(Request $request)
    {
        
    }
    public function CreateandUpdate(Request $request,$product_id=null)
    {  
       $user=Auth::user();
       //dd($user->id);
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
        return back()->with('success', 'Add to Wishlist');
        
        }

       

        // dd($product_id);
        // echo "wishlist";
    }
}
