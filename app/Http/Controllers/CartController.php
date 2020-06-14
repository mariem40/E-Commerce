<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Product;
use Illuminate\Support\Facades\Session;
class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('frontend.cart.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		
       $duplicata=Cart::search(function($cartItem,$rowId)use ($request){
		return $cartItem->id== $request->product_id;
	});
	
		if($duplicata->isNotEmpty()){
		
return redirect()->route('frontend.products.index')->with('success','Le produit a déjà été ajouté .');
	}

	$product=Product::find($request->product_id);
        Cart::add($product->id,$product->name,1,$product->price)->associate('App\Product');
		
return redirect()->route('frontend.products.index')->with('success','Le produit a bien été ajouté .');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $rowID)
    {
        $data=$request->json()->all();
		Cart::update($rowID,$data['qte']);
		Session::Flash('success','La quantité du produit est passée à ' . $data['qte'] . '.');
		return response()->json(['success'=>'cart quantity has been updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cart::remove($id);
		return redirect('cart')->with('success','Le produit a été supprimé.');
    }
}
