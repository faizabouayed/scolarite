<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Promotion;
use App\Models\Option;
use App\Models\Etudiant;
use Illuminate\Support\Facades\DB;

class EtudiantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $listEtud = Etudiant::all();
       // $results= DB::table('')
        
        if ($request->has('trashed')) {
            $listEtud = Etudiant::onlyTrashed()
                ->get();
        } else {
            $listEtud = Etudiant::get();
        }
 
        return view('admin.listeEtud', ['etudiants' => $listEtud]);
    }
    public function viewRelever($id_etud){
        $etudiant = Etudiant::find($id_etud);
       // if(Module::where(['semestre'=>'S1'])->first()){
        $modules1=DB::table('modules')
        ->join('options','options.id_opt','=','modules.option')
        ->join('promotions','options.id_opt','=','promotions.option')
        ->join('etudiants','promotions.id_pr','=','etudiants.promo')
        ->where('modules.semestre',$S='S1')
        ->where('etudiants.id_etud',$id=$id_etud)
        ->get(); 
        $modules2=DB::table('modules')
        ->join('options','options.id_opt','=','modules.option')
        ->join('promotions','options.id_opt','=','promotions.option')
        ->join('etudiants','promotions.id_pr','=','etudiants.promo')
        ->where('modules.semestre',$S='S2')
        ->where('etudiants.id_etud',$id=$id_etud)
        ->get(); 
         $modules3=DB::table('modules')
        ->join('options','options.id_opt','=','modules.option')
        ->join('promotions','options.id_opt','=','promotions.option')
        ->join('etudiants','promotions.id_pr','=','etudiants.promo')
        ->where('modules.semestre',$S='S3')
        ->where('etudiants.id_etud',$id=$id_etud)
        ->get(); 
        $modules4=DB::table('modules')
        ->join('options','options.id_opt','=','modules.option')
        ->join('promotions','options.id_opt','=','promotions.option')
        ->join('etudiants','promotions.id_pr','=','etudiants.promo')
        ->where('modules.semestre',$S='S4')
        ->where('etudiants.id_etud',$id=$id_etud)
        ->get(); 
         $modules5=DB::table('modules')
        ->join('options','options.id_opt','=','modules.option')
        ->join('promotions','options.id_opt','=','promotions.option')
        ->join('etudiants','promotions.id_pr','=','etudiants.promo')
        ->where('modules.semestre',$S='S5')
        ->where('etudiants.id_etud',$id=$id_etud)
        ->get(); 
        $modules6=DB::table('modules')
        ->join('options','options.id_opt','=','modules.option')
        ->join('promotions','options.id_opt','=','promotions.option')
        ->join('etudiants','promotions.id_pr','=','etudiants.promo')
        ->where('modules.semestre',$S='S6')
        ->where('etudiants.id_etud',$id=$id_etud)
        ->get(); 
         $modules7=DB::table('modules')
        ->join('options','options.id_opt','=','modules.option')
        ->join('promotions','options.id_opt','=','promotions.option')
        ->join('etudiants','promotions.id_pr','=','etudiants.promo')
        ->where('modules.semestre',$S='S7')
        ->where('etudiants.id_etud',$id=$id_etud)
        ->get(); 
        $modules8=DB::table('modules')
        ->join('options','options.id_opt','=','modules.option')
        ->join('promotions','options.id_opt','=','promotions.option')
        ->join('etudiants','promotions.id_pr','=','etudiants.promo')
        ->where('modules.semestre',$S='S8')
        ->where('etudiants.id_etud',$id=$id_etud)
        ->get(); 
         $modules9=DB::table('modules')
        ->join('options','options.id_opt','=','modules.option')
        ->join('promotions','options.id_opt','=','promotions.option')
        ->join('etudiants','promotions.id_pr','=','etudiants.promo')
        ->where('modules.semestre',$S='S9')
        ->where('etudiants.id_etud',$id=$id_etud)
        ->get(); 
        $modules10=DB::table('modules')
        ->join('options','options.id_opt','=','modules.option')
        ->join('promotions','options.id_opt','=','promotions.option')
        ->join('etudiants','promotions.id_pr','=','etudiants.promo')
        ->where('modules.semestre',$S='S10')
        ->where('etudiants.id_etud',$id=$id_etud)
        ->get();

        $cc=DB::table('etudiants')
        ->join('notes','etudiants.id_etud','=','notes.etudiant')
        ->where('notes.module',$module='module1')
        ->where('notes.type',$t='CC')
        ->where('etudiants.id_etud',$id=$etudiant)
        ->get();
        $ef=DB::table('etudiants')
        ->join('notes','etudiants.id_etud','=','notes.etudiant')
        ->where('notes.module',$module='module1')
        ->where('notes.type',$t='EF')
        ->where('etudiants.id_etud',$id=$etudiant)
        ->get();
        $tp=DB::table('etudiants')
        ->join('notes','etudiants.id_etud','=','notes.etudiant')
        ->where('notes.module',$module='module1')
        ->where('notes.type',$t='TP')
        ->where('etudiants.id_etud',$id=$etudiant)        
        ->get(); 

        return view('admin.relever',compact('etudiant','modules1','modules2' ,'modules3','modules4','modules5','modules6','modules7','modules8','modules9','modules10','cc','ef','tp')); 
      //  }               
    }
    

    public function destroy($id)
    {
        $etudiant = Etudiant::find($id); //delete();
        $etudiant->delete();
 
        return redirect()->back()->with('status','Etudiant Deleted Successfully');
    }
    public function supp($id)
    {
        Etudiant::onlyTrashed()->find($id)->forceDelete();
 
        return redirect()->back()->with('status','Etudiant Deleted Successfully');
    }
    public function restore($id)
    {
        Etudiant::withTrashed()->find($id)->restore();
 
        return redirect()->back();
    }
    public function restoreAll()
    {      
        Etudiant::onlyTrashed()->restore();
 
        return redirect()->back();
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createEtud()
    {
         return view('admin.createEtud');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeEtud(Request $request)
    {
        //
        $etudiant = new Etudiant();
        //$etudiant->photo = $request->input('photo');
        $etudiant->nom = $request->input('nom');
        $etudiant->prenom = $request->input('prenom');
        $etudiant->date_de_naissance = $request->input('date_de_naissance');
        $etudiant->date_inscription = $request->input('date_inscription');
        $etudiant->promo = $request->input('promo');
        $etudiant->save();
        return redirect('etudiants');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
}
