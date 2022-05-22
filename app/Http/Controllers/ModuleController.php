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
->join('options','options.id_opt','=','promotions.option')
->join('modules','options.id_opt','=','modules.option')
->where('modules.enseignant',Auth::user()->id)
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
->join('options','options.id_opt','=','promotions.option')
->join('modules','options.id_opt','=','modules.option')
->where('modules.enseignant',Auth::user()->id)
->where('annee_debut',$y=$current_year)
->orWhere('annee_fin',$x=$current_year)
->orderBy('annee_debut','desc')
->distinct('libelle_pr')
->get();

$promo = DB::table('promotions')
->join('options','options.id_opt','=','promotions.option')
->join('modules','options.id_opt','=','modules.option')
->where('modules.enseignant',Auth::user()->id)
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
->join('options','options.id_opt','=','promotions.option')
->join('modules','options.id_opt','=','modules.option')
->where('modules.enseignant',Auth::user()->id)
->where('annee_debut',$y=$current_year)
->orWhere('annee_fin',$x=$current_year)
->orderBy('annee_debut','desc')
->distinct('libelle_pr')
->get();
if(Promotion::where('libelle_pr',$libelle)->exists()){
$promotion = Promotion::where('libelle_pr',$libelle)->first();
if ($request->has('trashed')) {
$etudiants = Etudiant::where('promo',$promotion->id_pr)::onlyTrashed()


->get();
}
else {
$etudiants = Etudiant::where('promo',$promotion->id_pr)->get();
}
return view('listeetudiant',compact('promotion','etudiants','b','m'));
}
else return redirect()->back();
}}
