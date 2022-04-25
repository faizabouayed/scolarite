<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ModuleController extends Controller
{
    //
    public function ListeModules(){
 
        /*$f=Module::all();
        return view('modules',['mo'=>$f]);*/
        $f=DB::table('options')
        ->join('modules','options.id','=','modules.option')
        ->get();
         return view('modules',['mo'=>$f]);
    }
}
