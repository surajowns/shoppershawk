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
        $userdeta=Auth::user();
        $subtotal=0;
        if(!empty($userdeta)){
               
           $cartdetails=CartModel::with('products','products.productImage')->where('user_id',$userdeta['id'])->get()->toArray();
        //    dd($cartdetails);
            foreach($cartdetails as $data){
                $subtotal=$subtotal+$data['quantity']*$data['price'];
            }

        }else{
            $cartdetails=Cart::getContent()->toArray(); 
        } 

       
        return view('front/common/cart',compact('cartdetails','subtotal'));
    }

    public function DirecttoCart(Request $request,$id=null)
    {
        try{
        $user=Auth::user();
        //dd($user);
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
           if(!empty($user)){
           $checkcart=CartModel::where('user_id',$user->id)->where('product_id',$id)->first();
         //   dd($checkcart);
           }
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
        
          return redirect('user/checkout');
        }catch(\Exception $e){
            return back()->with('error',$e->getMessage());
        }
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
           $totalwishlist=0;
           $check=Wishlist::where('user_id',isset($user['id'])?$user['id']:'')->where('product_id',$request->productid)->first();
           if(!empty($check) && !empty($user)){
               Wishlist::where('user_id',$user->id)->where('product_id',$request->productid)->delete();
               $totalwishlist=Wishlist::where('user_id',$user->id)->count();
              }
            
              $checkcart=CartModel::where('user_id',isset($user['id'])?$user['id']:'')->where('product_id',$request->productid)->first();
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

            
             if(!empty($user)){
                $carttotal=0;
                $cartdetails=CartModel::with('products','products.productImage')->where('user_id',$user['id'])->get()->toArray();
             //    dd($cartdetails);
             $totalin_cart=0;
                 foreach($cartdetails as $data){
                    //  $totalin_cart= $totalin_cart+$data['quantity'];
                     $carttotal=$carttotal+$data['quantity']*$data['price'];
                     $totalin_cart++;
                 }

     
             }else{
                 $cartdetails=Cart::getContent()->toArray(); 
                 $carttotal=Cart::getSubTotal();
                 $totalin_cart=Cart::getContent()->count();
             }
             
           return response()->json(array('status'=>'success','totalin_cart'=>$totalin_cart,'carttotal'=>number_format($carttotal,2),'data'=>$cartdetails,'redirect'=>$request->producturl,'totalwishlist'=>$totalwishlist,'msg'=>'success'));   

    }

    public function removecart(Request $request)
    {    $user=Auth::user();
        
        Cart::remove($request->productid);
        $check=CartModel::where('product_id',$request->productid)->first();
        if(!empty($check) && !empty($user)){
            CartModel::where('user_id',$user->id)->where('product_id',$check['product_id'])->delete();
           }
           if(!empty($user)){
            $carttotal=0;
            $cartdetails=CartModel::with('products','products.productImage')->where('user_id',$user['id'])->get()->toArray();
         //    dd($cartdetails);
             $totalin_cart=0;
             foreach($cartdetails as $data){
                //  $totalin_cart= $totalin_cart+$data['quantity'];
                 $carttotal=$carttotal+$data['quantity']*$data['price'];
                 $totalin_cart++;
             }
 
         }else{
             $cartdetails=Cart::getContent()->toArray(); 
             $carttotal=Cart::getSubTotal();
             $totalin_cart=Cart::getContent()->count();
         }

        return response()->json(array('status'=>'success','totalin_cart'=>$totalin_cart,'carttotal'=>number_format($carttotal,2),'msg'=>'success'));   

    }

    public function updateCart(Request $request)
    {
        $qty=$request->value;
        $products=Product::where('id',$request->productid)->where('qty','>=',$qty)->first();
        if(empty($products)){
            $products=Product::where('id',$request->productid)->first();
            $qty=$products['qty'];
            // return response()->json(['status'=>'error','message'=>'This product can not add more']);
        }

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
