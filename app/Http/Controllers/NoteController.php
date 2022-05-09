<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Promotion;
use App\Models\Note;
use Auth;


class NoteController extends Controller
{
    //
    public function ListeNotes($module,$promotion){

        $f=DB::table('etudiants')
        ->join('notes','etudiants.id_etud','=','notes.etudiant')
        ->where('notes.module',$module)
        ->where('etudiants.promo',$v=$promotion)
        ->get();
        $b = DB::table('users')
        ->where('id','=',Auth::user()->id)
        ->get();

$m = DB::table('promotions')
        ->get();

       /* $f=DB::table('etudiants')
        ->join('notes','etudiants.id_etud','=','notes.etudiant')
        ->where('notes.module',$module)
        ->where('etudiants.promo',$v=$promotion)
        ->where('notes.type',$t='CC')
        ->get();
        $f2=DB::table('etudiants')
        ->join('notes','etudiants.id_etud','=','notes.etudiant')
        ->where('notes.module',$module)
        ->where('etudiants.promo',$v=$promotion)
        ->where('notes.type',$t='EF')
        ->get();
        $f3=DB::table('etudiants')
        ->join('notes','etudiants.id_etud','=','notes.etudiant')
        ->where('notes.module',$module)
        ->where('etudiants.promo',$v=$promotion)
        ->where('notes.type',$t='TP')
        ->get();*/
         return view('notes',compact('f','b','m'));
    }
     public function edit($module,$id_note){
        $user = Note::find($id_note);
        $b = DB::table('users')
        ->where('id','=',Auth::user()->id)
        ->get();
        return view('notes', ['user'=>$user], ['b'=>$b]);

    }
    public function update(Request $request,$module,$id_note){
        $User = Note::find($id_note);
        $User->note_ef = $request->input('note_ef');
        $User->note_cc = $request->input('note_cc');
        $User->note_tp = $request->input('note_tp');
        $User->save();
        return redirect('notes');        
    }
}
