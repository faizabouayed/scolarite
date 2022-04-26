<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Promotion;


class NoteController extends Controller
{
    //
    public function ListeNotes($module,$promotion){
       
        $f=DB::table('etudiants')
        ->join('notes','etudiants.id','=','notes.etudiants')
        ->where('notes.modules',$module)
        ->where('etudiants.promo',$v=$promotion)
        ->where('notes.type',$t='CC')
        ->get();
        $f2=DB::table('etudiants')
        ->join('notes','etudiants.id','=','notes.etudiants')
        ->where('notes.modules',$module)
        ->where('etudiants.promo',$v=$promotion)
        ->where('notes.type',$t='EF')
        ->get();
        $f3=DB::table('etudiants')
        ->join('notes','etudiants.id','=','notes.etudiants')
        ->where('notes.modules',$module)
        ->where('etudiants.promo',$v=$promotion)
        ->where('notes.type',$t='TP')
        ->get();
         return view('notes',compact('f','f2','f3'));
    }
}
