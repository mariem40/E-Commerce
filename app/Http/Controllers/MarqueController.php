<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Marque as MarqueRequest;

use App\Marque;
class MarqueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $marques = Marque::oldest('name')->paginate(5);
        return view('marques.index', compact('marques'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('marques.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
   public function store(MarqueRequest $marqueRequest)
    {
       Marque::create($marqueRequest->all());
    return redirect()->route('marques.index')->with('success', 'marque a bien été créé');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function show(Marque $marque)
    {
        return view('marques.show', compact('marque'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Marque $marque)
    {
        return view('marques.edit', compact('marque'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MarqueRequest $marqueRequest, Marque $marque)
    {
        $marque->update($marqueRequest->all());
    return redirect()->route('marques.index')->with('success', 'La marque a bien été modifié');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Marque $marque)
    {
        $marque->delete();
    return back()->with('success', 'La marque a bien été supprimé.');
    }
	 public function forceDestroy($id)
    {
     Marque::withTrashed()->whereId($id)->firstOrFail()->forceDelete();
 
     return back()->with('success', 'La marque a bien été supprimé définitivement dans la base de données.');
    }
    public function restore($id)
    {
     Marque::withTrashed()->whereId($id)->firstOrFail()->restore();
 
     return back()->with('success', 'la marque a bien été restauré.');
    }
	
}
