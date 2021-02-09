<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Cart;
use Session;
use Auth;

class CartController extends Controller
{
    public function AddtoCart(Request $request)
    {
           
        $quantity = 1 ;
        // dd($request->all());
            $products=Product::with('productImage')->where('id',$request->productid)->first()->toArray();
        //    dd($products);
           $add  =  array('id'=>$request->productid,
           'slug'=>$products['slug'],
           'name'=> $products['name'],
           'price'=>$products['selling_price'],
           'quantity'=>$quantity,
           'attributes' => array(
                                 'image'=>$products['product_image'][0]['image'],
                                ),
                                
           );
           Cart::add($add); 
           return response()->json(array('status'=>'success','msg'=>'success'));   

    }

    public function removecart(Request $request)
    {
        // dd($request->productid);
        Cart::remove($request->productid);
        return response()->json(array('status'=>'success','msg'=>'success'));   

    }
}
