<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Cart;
use Session;
use Auth;
use App\Wishlist;
use App\CartModel;

class CartController extends Controller
{
    public function index(Request $request)
    {
        $cartdetails=Cart::getContent()->toArray(); 
       
        return view('front/common/cart',compact('cartdetails'));
    }

    public function DirecttoCart(Request $request,$id=null)
    {
        $user=Auth::user();
        $quantity = 1 ;
        $products=Product::with('productImage')->where('id',$id)->first()->toArray();
        $add  =  array('id'=>$id,
        
        'name'=> $products['name'],
        'price'=>$products['selling_price'],
        'quantity'=>$quantity,
        'attributes' => array(
                              'image'=>$products['product_image'][0]['image'],
                              'slug'=>$products['slug'],
                             ),
                             
        );
        Cart::add($add); 
        $check=Wishlist::where('product_id',$id)->first();
        if(!empty($check) && !empty($user)){
            Wishlist::where('user_id',$user->id)->where('product_id',$request->productid)->delete();
           }
         
           $checkcart=CartModel::where('product_id',$id)->first();
         //   dd($checkcart);
         if(!empty($checkcart) && !empty($user)){
              $quantity=$quantity+$checkcart['quantity'];
              CartModel::where('user_id',$user->id)->where('product_id',$checkcart['product_id'])->update(['quantity'=>$quantity]);
           
         }
         elseif(!empty($user)){
             $carts= new CartModel;
             $carts->user_id=$user->id;
             $carts->product_id=$id;
             $carts->price=$products['selling_price'];
             $carts->quantity=$quantity;
             $carts->save(); 
          }
        
          return redirect('user/cart_details');
        // return response()->json(array('status'=>'success','redirect'=>$request->producturl,'msg'=>'success'));   

    }

    public function AddtoCart(Request $request)
    {
           $user=Auth::user();
           $quantity = 1 ;
           $products=Product::with('productImage')->where('id',$request->productid)->first()->toArray();
           $add  =  array('id'=>$request->productid,
           
           'name'=> $products['name'],
           'price'=>$products['selling_price'],
           'quantity'=>$quantity,
           'attributes' => array(
                                 'image'=>$products['product_image'][0]['image'],
                                 'slug'=>$products['slug'],
                                ),
                                
           );
           Cart::add($add); 
           $check=Wishlist::where('product_id',$request->productid)->first();
           if(!empty($check) && !empty($user)){
               Wishlist::where('user_id',$user->id)->where('product_id',$request->productid)->delete();
              }
            
              $checkcart=CartModel::where('product_id',$request->productid)->first();
            //   dd($checkcart);
            if(!empty($checkcart) && !empty($user)){
                 $quantity=$quantity+$checkcart['quantity'];
                 CartModel::where('user_id',$user->id)->where('product_id',$checkcart['product_id'])->update(['quantity'=>$quantity]);
              
            }
            elseif(!empty($user)){
                $carts= new CartModel;
                $carts->user_id=$user->id;
                $carts->product_id=$request->productid;
                $carts->price=$products['selling_price'];
                $carts->quantity=$quantity;
                $carts->save(); 
             }

           return response()->json(array('status'=>'success','redirect'=>$request->producturl,'msg'=>'success'));   

    }

    public function removecart(Request $request)
    {    $user=Auth::user();
        Cart::remove($request->productid);
        $check=CartModel::where('product_id',$request->productid)->first();
        if(!empty($check) && !empty($user)){
            CartModel::where('user_id',$user->id)->where('product_id',$check['product_id'])->delete();
           }
        return response()->json(array('status'=>'success','msg'=>'success'));   

    }

    public function updateCart(Request $request)
    {
        $qty=$request->value;
        if($qty==0 || $qty==null){
            $id=$request->productid;
            $success=Cart::remove($id);
             return json_encode($success);
          }
        $success=Cart::update($request->productid,array(
                'quantity' => array(
                'relative' => false,
                'value' => $qty
            ),));

            $user=Auth::user();
            $checkcart=CartModel::where('product_id',$request->productid)->first();
            $quantity=1;
            if(!empty($checkcart) && !empty($user)){
                 CartModel::where('user_id',$user->id)->where('product_id',$checkcart['product_id'])->update(['quantity'=>$qty]);
              
            }
        return json_encode($success);
    }
}
