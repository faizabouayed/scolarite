<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Promotion;
use App\Models\Note;
use App\Models\Module;
use App\Models\Etudiant;

use Auth;


class NoteController extends Controller
{
    //
    public function ListeNotes($module,$promotion){

        $f=DB::table('etudiants')
        ->join('notes','etudiants.id_etud','=','notes.etudiant')
        ->join('modules','modules.id_mod','=','notes.module')
        ->where('notes.module',$module)
        ->where('etudiants.promo',$v=$promotion)
        ->get();
        $b = DB::table('users')
        ->where('id','=',Auth::user()->id)
        ->get();

        $current_year=date('Y');
        $m = DB::table('promotions')
        ->join('options','options.id_opt','=','promotions.option')
        ->join('modules','options.id_opt','=','modules.option')
        ->where('modules.enseignant',Auth::user()->id)
        ->where('annee_debut',$y=$current_year)
        ->orWhere('annee_fin',$x=$current_year)
        ->orderBy('annee_debut','desc')
        ->distinct('libelle_pr')
        ->get();

       /*$f=DB::table('etudiants')
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
     public function edit($id_note){
        $user = Note::find($id_note);
        $b = DB::table('users')
        ->where('id','=',Auth::user()->id)
        ->get();
        return view('notes', ['user'=>$user], ['b'=>$b]);

    }
    public function update(Request $request,$id_note){
        $note = Note::find($id_note);
        $module = Note::where('module',$request->input('module'))->first();
        $etudiant = Etudiant::where('nom',$request->input('nom'))->first();
        $note->note_ef = $request->input('note_ef');
        $note->note_cc = $request->input('note_cc');
        $note->note_tp = $request->input('note_tp');
        $note->save();
        return redirect()->back()->with('status','Notes Updated Successfully');        
       
    }
}
