<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;


class ModuleController extends Controller
{
    //
    /*public function ListeModules(){
 
        
        
        $f=DB::table('options')
        ->join('modules','options.id','=','modules.option')
        ->get();
         return view('modules',['mo'=>$f]);
    }*/

     public function ListeModules(){

    	/*$f=Module::all();
    	return view('modules',['mo'=>$f]);*/
       /* $u=Auth::user()
        ->get();*/

    	$f=DB::table('options')
    	->join('modules','options.id','=','modules.option')
    	->where('modules.enseignant','=',Auth::user()->id)
    	->get();
        $b = DB::table('users')
        ->where('id','=',Auth::user()->id)
        ->get();

    	$m = DB::table('promotions')
        ->get();

     return view('modules',compact('f','b','m'));
    }
}
