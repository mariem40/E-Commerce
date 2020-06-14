<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Product,Category,Marque};
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($slug=null)
    {
			$query = $slug ? Category::whereSlug($slug)->firstOrFail()->products() : Product::query();
    $products = $query->with('marque','categories','images')->withTrashed()->oldest('name')->paginate(5);
    return view('products.index', compact('products','slug'));
}

    
    public function create()
    {
       $categories=Category::all();
	   $marques=Marque::all();
		return view('products.create',compact('categories','marques'));
    }
	 public function searchp(Request $request)
	 {
		 $search=$request->get('search');
		 $products=Product::where('name','like','%'.$search.'%')->paginate(5);
		 return view('products.index',compact('products')) ;
		 
	 }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $productRequest)
    {
        $productRequest->validate([
		    'code' => 'required|unique:App\Product,code',
            'name' => 'required','string','min:6',
            'price' => 'required',
			'stock' => 'required',
            'detail' => 'required',
        ]);
            
        $image=time().'.'.$productRequest['image']->getClientOriginalExtension();
        $productRequest['image']->move(public_path('uploads/products'), $image);
        $file = 'uploads/products/'.$image;
            
      $product = Product::create([
        'code' => $productRequest['code'],
        'name' => $productRequest['name'],
        'price' => $productRequest['price'],
        'stock' => $productRequest['stock'],
        'detail' => $productRequest['detail'],
        'image' => $file,
        //'category_id' => $productRequest['category_id'],
		'marque_id' => $productRequest['marque_id'],
		
      ]);
	  $product->categories()->attach($productRequest->cats);
   
    return redirect()->route('products.index')->with('success', 'Le produit a bien été créé');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        
		return view('products.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
       $categories=Category::all();
       $marques=Marque::all();
       //$product = Product::with('marque','categories','images')->where('id',$id)->first();
	   return view('products.edit',compact('product','categories','marques'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $productRequest,Product $product)
    {
        $productRequest->validate([
		    'code' => 'required',
            'name' => 'required','string','min:6',
            'price' => 'required',
			'stock' => 'required',
            'detail' => 'required',
        ]);
		
		$file=$product->image;
if($productRequest['image']!=null)
{
	$image=time().'.'.$productRequest['image']->getClientOriginalExtension();
        $productRequest['image']->move(public_path('uploads/products'), $image);
$file = 'uploads/products/'.$image;}
    
      $product = Product::with('categories')->where('id',$product->id)->first();
      $product->update([
        'code' => $productRequest['code'],
        'name' => $productRequest['name'],
        'price' => $productRequest['price'],
        'stock' => $productRequest['stock'],
        'detail' => $productRequest['detail'],
        'image' => $file,
        //'category_id' => $productRequest['category_id'],
		'marque_id' => $productRequest['marque_id'],
      ]);
	  
   $product->categories()->sync($productRequest->cats);
    return redirect()->route('products.index')->with('success', 'Le produit a bien été modifié');
	}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return back()->with('success','le produit ' .$product->name. 'a bien mis dans la corbeille');
    }
    public function forceDestroy($id)
    {
     Product::withTrashed()->whereId($id)->firstOrFail()->forceDelete();
 
     return back()->with('success', 'Le produit a bien été supprimé définitivement dans la base de données.');
    }
    public function restore($id)
    {
     Product::withTrashed()->whereId($id)->firstOrFail()->restore();
 
     return back()->with('success', 'Le produit a bien été restauré.');
    }
	
}
