<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class SitemapController extends Controller
{
    public function Index(Request $request)
    {
         $products=Product::get();
        return response()->view('front.pages.sitemap',compact('products'))
        ->header('Content-Type', 'text/xml');
    }
}
