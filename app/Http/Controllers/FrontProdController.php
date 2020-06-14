<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\{Product,Category};
class FrontProdController extends Controller
{
     /* public function index()
    {  

	$products=Product::with('categories')->paginate(6);
	$categories=Category::with('products')->get();
        return view('frontend.products.index',compact('products','categories'));
    }*/
	  public function show(Product $product )
    {
		return view('frontend.products.show',compact('product'));
	
    }
	 public function search(Request $request)
	 {
		 $search=$request->get('search');
		 $products=Product::where('name','like','%'.$search.'%')->paginate(5);
		 return view('products.index',compact('products')) ;
		 
	 }
	 public function getProdByCategorie($id){
		 $categories=Category::Where('id',$id)->first();
		 $products=Product::with('categories')->get();
		 return view('frontend.products.index',compact('products','categories'));
		 
	 }
	/* public function getProdByCategorie($id){ 
	 $products = Product::join('categories','products.id', '=', 'categories.id') 
	 ->where('products.id','=', $id) ->select('products.*','categories.slug') ->first();
	 return view('products.index',compact('products')) ;}*/
	  
}
