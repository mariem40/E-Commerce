<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Product,Category};
class FrontController extends Controller
{
     public function index()
    {
        $products=Product::with('categories')->paginate(6);
	$categories=Category::with('products')->get();
        return view('frontend.index',compact('products','categories'));
    }
}
