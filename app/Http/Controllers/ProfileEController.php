<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use resources\view;

class ProfileEController extends Controller
{
    //
    public function show(User $user){
        
        //$user = User::find($username);
        //dd($id);
        return view('Profile-Ens',['user'=>$user]);

    }
    
}
