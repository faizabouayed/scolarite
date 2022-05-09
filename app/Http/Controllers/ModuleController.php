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

     public function ListeModules($prom){

      

        $f=DB::table('options')
        ->join('modules','options.id_opt','=','modules.option')
        ->join('promotions','options.id_opt','=','promotions.option')
        ->where('promotions.libelle_pr','=',$v=$prom)
        ->get(); 
      /* $f=DB::table('modules')
        ->join('options','options.id_opt','=','modules.option')
        ->join('promotions','options.id_opt','=','promotions.option')
        ->where('modules.enseignant','=',Auth::user()->id)
        ->where('promotions.id_pr','=',$v='1')
        ->get();*/

        $b = DB::table('users')
        ->where('id','=',Auth::user()->id)
        ->get();

        $m = DB::table('promotions')
        ->get();

     return view('modules',compact('f','b','m'));
    }
}