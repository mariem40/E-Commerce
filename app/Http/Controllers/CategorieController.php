<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Category as CategoryRequest;

use App\{Product,Category};
class CategorieController extends Controller
{
     public function index()
    {
       $categories = Category::withTrashed()->oldest('name')->paginate(5);

        return view('categories.index',compact('categories')) ;
    }
    public function create()
    {
       return view('categories.create');
    }
    public function store(CategoryRequest $categoryRequest)
    {
        $categoryRequest->validate([
            'name' => 'required|unique:App\Category,name',
            'slug' => 'required',
            
        ]);

        Category::create($categoryRequest->all());

        return redirect('categories')->with('success','la categorie a bien été crree.');
    }
	 public function search(Request $request)
	 {
		 $search=$request->get('search');
		 $categories=Category::where('name','like','%'.$search.'%')->paginate(5);
		
		 return view('categories.index',compact('categories')) ;
	 }
    
    public function show(Category $categorie)
    {
                return view('categories.show',compact('categorie'));
    }
    public function edit(Category $categorie)
    {
        return view('categories.edit',compact('categorie'));
    }
    public function update(Request $request,Category $categorie)
    {
         $request->validate([
            'name' => 'required|unique:App\Category,name',
            'slug' => 'required',
            
        ]);

        $categorie->update($request->all());

        return redirect('categories')->with('success','la categorie a bien été modifié');
    }
    public function destroy(Category $categorie)
	{
		$categorie->delete();
		return back()->with('success', 'La categorie '.$categorie->name.' a bien été mis dans la corbeille.');
	}
	public function forceDestroy($id)
   {
       Category::withTrashed()->whereId($id)->firstOrFail()->forceDelete();
 
        return back()->with('success', 'La catégorie a bien été supprimé définitivement dans la base de données.');
   }
    public function restore($id)
   {
       Category::withTrashed()->whereId($id)->firstOrFail()->restore();
 
       return back()->with('success', 'La categorie a bien été restauré.');
   }
}