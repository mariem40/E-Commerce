<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use App\User;
use Validator;
class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::with('user')->get();

       return view('clients.index')->with('clients',$clients);
	   
    }
	

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('clients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([

           'name' => 'required|max:120',
            'prenom'=>'required|max:120',
            'tel'=>'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:8',
            'password' => ['required', 'string', 'min:8'],
            'email' => 'required|email|unique:users',
            
           
            ]);
            
            
            
            $user = new \App\User; 
          
            $user->name = $request->name; 
            $user->prenom = $request->prenom; 
            $user->tel = $request->tel; 
            $user->email = $request->email; 
            $user->password = $request->password;
			$user->role = 'Client';
            $user->save();
			$client = new \App\Client; 
                $client->user_id = $user->id;
				$client->ville='null';
                $client->save();
           
        
            return redirect()->route('clients.index')
                ->with('success',
                 'Le client a été bien ajouter.');
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
        
            $client = Client::with('user')->find($id); //Get user with specified id
            
    
            return view('clients.edit', compact('client')); //pass user and roles data to view
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([

           'name' => 'required|max:120',
            'prenom'=>'required|max:120',
            'tel'=>'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:8',
            //'email' => 'required|email|unique:users',
           
            ]);
		$client=Client::where('id',$id)->with('user')->first();	
		User::where('id',$client->user->id)->update([
             'name' => $request->name,
            'prenom' => $request->prenom,
            'tel' => $request->tel,
            'email' => $request->email,
			 ]); 
			Client::where('id',$id)->update([
            'user_id' => $client->user->id,
            ]); 
            return redirect()->route('clients.index')->with('success', 'Le client a bien été modifié');
           
            
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id )
    {
               $client = Client::with('user')->findOrFail($id);
        User::where('id',$client->user['id'])->delete();
        Client::where('id',$client->id)->delete();
    return back()->with('success', 'Le client a bien été supprimé');
    
    }
	 
	
}
