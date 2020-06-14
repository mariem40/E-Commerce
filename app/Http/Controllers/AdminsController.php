<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use App\User;
use Validator;
class AdminsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $admins = Admin::with('user')->get();

       return view('admins.index')->with('admins',$admins);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('admins.create');
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
        'password' => 'required|min:5',
        'email' => 'required|email|unique:users',
        
        'age' => 'required|max:100',
        
       
        ]);
        
                $user = new \App\User; 
                $user->name = $request->name; 
                $user->prenom = $request->prenom;  
                $user->tel = $request->tel; 
                $user->email = $request->email; 
                $user->password = $request->password;
                $user->role = 'Admin';
          
                $user->save();
                
                $admin = new \App\Admin; 
                $admin->user_id = $user->id; 
				$admin->age = $request->age;
				      
                $admin->save();
                return redirect()->route('admins.index')
                ->with('success',
                 'admin a été bien modifier.');
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
       
            $admin = Admin::with('user')->find($id); //Get user with specified id
            
    
            return view('admins.edit', compact('admin')); //pass user and roles data to view
           
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
        //'password' => 'required|min:5',
        //'email' => 'required|email|unique:users',
        
        'age' => 'required|max:100',
        
       
        ]);
		$admin=Admin::where('id',$id)->with('user')->first();
       

        
        User::where('id',$admin->user->id)->update([
             'name' => $request->name,
            'prenom' => $request->prenom,
            'tel' => $request->tel,
            'email' => $request->email,
            
            
           
            
            ]);
           
           
           Admin::where('id',$id)->update([
            'user_id' => $admin->user->id,
			'age'=>$request->age,
			
            ]); 
            return redirect()->route('admins.index')->with('success', 'Ladministrateur a bien été modifié');
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $admin = Admin::with('user')->findOrFail($id);
        User::where('id',$admin->user['id'])->delete();
        Admin::where('id',$admin->id)->delete();
    return redirect()->route('admins.index')->with('success','admin ' .$admin->user->name. 'a bien été supprimé');
    }
}
