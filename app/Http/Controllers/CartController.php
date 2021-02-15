<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Cart;
use Session;
use Auth;

class CartController extends Controller
{
    public function index(Request $request)
    {
        $cartdetails=Cart::getContent()->toArray(); 
       
        return view('front/common/cart',compact('cartdetails'));
    }

    public function AddtoCart(Request $request)
    {
           
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
       
           return response()->json(array('status'=>'success','redirect'=>$request->producturl,'msg'=>'success'));   

    }

    public function removecart(Request $request)
    {
        Cart::remove($request->productid);
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
        return json_encode($success);
    }
}
