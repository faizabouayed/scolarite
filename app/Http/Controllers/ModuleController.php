<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Promotion;
use App\Models\Etudiant;
use Auth;


class ModuleController extends Controller
{
    //
public function ListeModules($opt,$promo){





/* vraiiiiii $f=DB::table('options')
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
/* $f=DB::table('modules')
->join('options','options.id_opt','=','modules.option')
->join('promotions','options.id_opt','=','promotions.option')
->where('promotions.libelle_pr','=',$v='1')
->where('modules.enseignant','=',Auth::user()->id)
->where('option','=',$v=$opt)
->get();*/
/* $f2=DB::table('promotions')
->join('options','options.id_opt','=','promotions.option')
->where('modules.option','=',$v=$opt)
->get();*/

$b = DB::table('users')
->where('id','=',Auth::user()->id)
->get();



$current_year=date('Y');
$m = DB::table('promotions')
/*->join('options','options.id_opt','=','promotions.option')
->join('modules','options.id_opt','=','modules.option')
->where('modules.enseignant',Auth::user()->id)*/
->where('annee_debut',$y=$current_year)
->orWhere('annee_fin',$x=$current_year)
->orderBy('annee_debut','desc')
->distinct('libelle_pr')
->get();




return view('modules',compact('f','b','m'));
}
public function archive(){
$b = DB::table('users')
->where('id','=',Auth::user()->id)
->get();
$current_year=date('Y');
$m = DB::table('promotions')
/*->join('options','options.id_opt','=','promotions.option')
->join('modules','options.id_opt','=','modules.option')
->where('modules.enseignant',Auth::user()->id)*/
->where('annee_debut',$y=$current_year)
->orWhere('annee_fin',$x=$current_year)
->orderBy('annee_debut','desc')
->distinct('libelle_pr')
->get();



$promo = DB::table('promotions')
/*->join('options','options.id_opt','=','promotions.option')
->join('modules','options.id_opt','=','modules.option')
->where('modules.enseignant',Auth::user()->id)*/
->where('annee_debut','!=',$current_year)
->Where('annee_fin','!=',$current_year)
->orderBy('annee_debut','desc')
->distinct('modules.enseignant')
->get();
return view('archives',compact('promo','b','m'));
}
public function viewEtudiant($libelle, Request $request){
$b = DB::table('users')
->where('id','=',Auth::user()->id)
->get();
$current_year=date('Y');
$m = DB::table('promotions')
/*->join('options','options.id_opt','=','promotions.option')
->join('modules','options.id_opt','=','modules.option')
->where('modules.enseignant',Auth::user()->id)*/
->where('annee_debut',$y=$current_year)
->orWhere('annee_fin',$x=$current_year)
->orderBy('annee_debut','desc')
->distinct('libelle_pr')
->get();
if(Promotion::where('libelle_pr',$libelle)->exists()){
$promotion = Promotion::where('libelle_pr',$libelle)->first();
if ($request->has('trashed')) {
$etudiants = Etudiant::where('promo',$promotion->id_pr)::onlyTrashed()
->join('promotions','promotions.id_pr','=','etudiants.promo')
->join('options','options.id_opt','=','promotions.option')


->get();
}
else {
$etudiants = Etudiant::where('promo',$promotion->id_pr)
->join('promotions','promotions.id_pr','=','etudiants.promo')
->join('options','options.id_opt','=','promotions.option')
->get();
}
return view('listeetudiant',compact('promotion','etudiants','b','m'));
}
else return redirect()->back();
}


public function viewRelever($id_etud,$promo,$option){

    $b = DB::table('users')
    ->where('id','=',Auth::user()->id)
    ->get();
    $current_year=date('Y');
    $m = DB::table('promotions')
    /*->join('options','options.id_opt','=','promotions.option')
    ->join('modules','options.id_opt','=','modules.option')
    ->where('modules.enseignant',Auth::user()->id)*/
    ->where('annee_debut',$y=$current_year)
    ->orWhere('annee_fin',$x=$current_year)
    ->orderBy('annee_debut','desc')
    ->distinct('libelle_pr')
    ->get();


    $etudiant = Etudiant::join('promotions','promotions.id_pr','=','etudiants.promo')
    ->join('options','options.id_opt','=','promotions.option')
    ->where('options.id_opt',$x2=$option)

    ->where('promotions.id_pr',$x1=$promo)
    ->find($id_etud);
    

   $nbrMS1=DB::table('modules')
   ->join('options','options.id_opt','=','modules.option')
   ->join('promotions','options.id_opt','=','promotions.option')
   ->join('notes','notes.module','=','modules.id_mod')
   ->join('etudiants','notes.etudiant','=','etudiants.id_etud')
   ->where('modules.semestre',$S='S1')
   ->where('notes.etudiant',$id=$id_etud)
   ->where('modules.option',$x2=$option)
   ->where('promotions.id_pr',$x=$promo)
   ->count();
   $nbrMS2=DB::table('modules')
   ->join('options','options.id_opt','=','modules.option')
   ->join('promotions','options.id_opt','=','promotions.option')
   ->join('notes','notes.module','=','modules.id_mod')
   ->join('etudiants','notes.etudiant','=','etudiants.id_etud')
   ->where('modules.semestre',$S='S2')
   ->where('notes.etudiant',$id=$id_etud)
   ->where('modules.option',$x2=$option)
   ->where('promotions.id_pr',$x=$promo)
   ->count();
  
    $var1=DB::table('notes')
    ->select(DB::raw("code,libelle,note_cc,note_tp,note_ef,libelle_opt"))
    ->join('modules','modules.id_mod','=','notes.module')
    ->join('etudiants','etudiants.id_etud','=','notes.etudiant')
    ->join('promotions','promotions.id_pr','=','etudiants.promo')
    ->join('options','options.id_opt','=','promotions.option')
    ->where('modules.semestre',$S='S1')
    ->where('etudiants.id_etud',$id=$id_etud)
    ->where('modules.option',$x2=$option)
    
    ->where('promotions.id_pr',$x=$promo)
    ->groupBy('code','libelle','note_cc','note_tp','note_ef','libelle_opt')
    ->get();

    $var2=DB::table('notes')       
    ->select(DB::raw("code,libelle,note_cc,note_tp,note_ef,libelle_pr"))
    ->join('modules','modules.id_mod','=','notes.module')
    ->join('etudiants','etudiants.id_etud','=','notes.etudiant')
    ->join('promotions','promotions.id_pr','=','etudiants.promo')
    ->join('options','options.id_opt','=','promotions.option')
    ->where('modules.semestre',$S='S2')
    ->where('etudiants.id_etud',$id=$id_etud)
    ->where('modules.option',$x2=$option)
    ->where('promotions.id_pr',$x=$promo)
    ->groupBy('code','libelle','note_cc','note_tp','note_ef','libelle_pr')
    ->get();

   
   

    
          
    return view('releverEns',compact('etudiant','var1','var2','nbrMS1','nbrMS2','b','m')); 
}

}
