<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Promotion;
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

     public function ListeModules($opt,$promo){

      

        /*   vraiiiiii  $f=DB::table('options')
        ->join('modules','options.id_opt','=','modules.option')
        ->join('promotions','options.id_opt','=','promotions.option')
        ->where('promotions.libelle_pr','=',$v=$prom)
        ->get(); */
        $f=DB::table('options')
        ->join('modules','options.id_opt','=','modules.option')
        ->join('promotions','options.id_opt','=','promotions.option')
        ->where('promotions.id_pr','=',$v2=$promo)
        ->where('modules.enseignant','=',Auth::user()->id)
        ->where('modules.option','=',$v=$opt)
        ->get();
     /*  $f=DB::table('modules')
        ->join('options','options.id_opt','=','modules.option')
        ->join('promotions','options.id_opt','=','promotions.option')
        ->where('promotions.libelle_pr','=',$v='1')
        ->where('modules.enseignant','=',Auth::user()->id)
        ->where('option','=',$v=$opt)
        ->get();*/
      /*  $f2=DB::table('promotions')
        ->join('options','options.id_opt','=','promotions.option')
        ->where('modules.option','=',$v=$opt)
        ->get();*/

        $b = DB::table('users')
        ->where('id','=',Auth::user()->id)
        ->get();

        $m = DB::table('promotions')
        ->join('options','options.id_opt','=','promotions.option')
        ->join('modules','options.id_opt','=','modules.option')
        ->where('modules.enseignant',Auth::user()->id)       
        ->where('modules.option',$o=$opt)
        ->orderBy('libelle_pr','desc')
        ->distinct()
        ->get();

     return view('modules',compact('f','b','m'));
    }
}
