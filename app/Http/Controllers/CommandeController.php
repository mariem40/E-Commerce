<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommandeController extends Controller
{
     public function index()
    {
       // $clients = Client::with('user')->get();

       return view('frontend.commande.index');
	   
    }
}
