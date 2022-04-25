<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NoteController extends Controller
{
    //
    public function ListeNotes($module){
 
        $f=DB::table('etudiants')
        ->join('notes','etudiants.id','=','notes.etudiants')
        ->where('notes.modules',$module)
        ->where('notes.type',$t='CC')
        ->get();
        $f2=DB::table('etudiants')
        ->join('notes','etudiants.id','=','notes.etudiants')
        ->where('notes.modules',$module)
        ->where('notes.type',$t='EF')
        ->get();
        $f3=DB::table('etudiants')
        ->join('notes','etudiants.id','=','notes.etudiants')
        ->where('notes.modules',$module)
        ->where('notes.type',$t='TP')
        ->get();
         return view('notes',compact('f','f2','f3'));
    }
}
