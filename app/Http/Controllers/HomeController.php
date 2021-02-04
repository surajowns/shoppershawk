<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\CategoryModel;

class HomeController extends Controller
{
    public function index(Request $request)
    {
         return view('front.index');
    }
    public function Register(Request $request)
    {
        return view('front.common.register');
    }
    public function Login(Request $request)
    {
        return view('front.common.login');
    }
    public function ProuctList(Request $request,$slug)
    {
        $product=Product::with('productImage')->where('status',1)->get()->toArray();
        $category =CategoryModel::where('status',1)->where('parent_id',0)->get();
        $i=0;foreach($category as $cat){
        $category[$i]['subcat']=CategoryModel::where('status',1)->where('parent_id',$cat['id'])->get();
        $i++;
        }
        return view('front.common.productlist',compact('product','category'));
    }
}
