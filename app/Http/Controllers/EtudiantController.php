<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Promotion;
use App\Models\Option;
use App\Models\Etudiant;
use App\Models\Module;

use Illuminate\Support\Facades\DB;
use Image;

class EtudiantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   $listePromo = Promotion::all();
        $listEtud = Etudiant::all();
        if ($request->has('trashed')) {
           
            $listEtud = Etudiant::onlyTrashed()
            ->join('promotions','promotions.id_pr','=','etudiants.promo')
            ->join('options','options.id_opt','=','promotions.option')
                ->get();
        } else {
            $listEtud = Etudiant::join('promotions','promotions.id_pr','=','etudiants.promo')
            ->join('options','options.id_opt','=','promotions.option')
            ->get();
            /*$listPromo=DB::table('promotions')
            ->join('options','options.id_opt','=','promotions.option')
            ->get(); */
        }
       
 
        return view('admin.listeEtud', ['etudiants' => $listEtud],['listePromo' => $listePromo]);
    }

    
    public function viewRelever($id_etud,$promo,$option){
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

       
       

        
              
        return view('admin.relever',compact('etudiant','var1','var2','nbrMS1','nbrMS2')); 
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
    {     $listePromo = Promotion::all();

         return view('admin.listeEtud',['listePromo' => $listePromo]);
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
          $request->validate([
                  'nom' => ['required','string','max:100'],
                  'prenom' => ['required','string','max:100'],
                 'date_de_naissance' => ['required','date'],
                 'date_inscription' => ['required','date'],
            ]);
         $etudiant = new Etudiant();

        if($request->hasFile('photo')){
        $avatar=$request->file('photo');
        $filename=time() . '.' . $avatar->getClientOriginalExtension();
        Image::Make($avatar)->resize(300,300)->save(public_path('/telechargement/avatar/'. $filename));
       
         $etudiant->photo=$filename;
         
      
             }
       
        //$etudiant->photo = $request->input('photo');
        $etudiant->nom = $request->input('nom');
        $etudiant->prenom = $request->input('prenom');
        $etudiant->date_de_naissance = $request->input('date_de_naissance');
        $etudiant->date_inscription = $request->input('date_inscription');
        $etudiant->promo = $request->input('promo');
        $etudiant->save();
        return redirect()->route('etudiants.index')->with('success', 'Data saved');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function createprEtud($p)
    { 
        return view('admin.promo_etud',['promotion' => $p]);
    }
    public function storeprEtud(Request $request)
    {   
        $request->validate([
                  'nom' => ['required','string','max:100'],
                  'prenom' => ['required','string','max:100'],
                 'date_de_naissance' => ['required','date'],
                 'date_inscription' => ['required','date'],
            ]);
        $etudiant = new Etudiant();
        $promotion = Promotion::where('libelle_pr',$request->input('promotion'))->first();
        //$etudiant->photo = $request->input('photo');
        $etudiant->nom = $request->input('nom');
        $etudiant->prenom = $request->input('prenom');
        $etudiant->date_de_naissance = $request->input('date_de_naissance');
        $etudiant->date_inscription = $request->input('date_inscription');
        $etudiant->promo = $promotion->id_pr;
        $etudiant->save();
      
        return redirect()->route('promos.viewEtud', $promotion->libelle_pr)->with('success', 'Data saved');
        //dd($request);
    }
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
        return view('admin.promo_etud');
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

       
        if($request->hasFile('photo')){
        $avatar=$request->file('photo');
        $filename=time() . '.' . $avatar->getClientOriginalExtension();
        Image::Make($avatar)->resize(300,300)->save(public_path('/telechargement/avatar/'. $filename));
        $user=Etudiant::find($id);
        $user->photo=$filename;
        $user->save();
      
 }
                  
        $etudiant = Etudiant::find($id);
        
        $etudiant->nom= $request->input('nom');
        $etudiant->prenom = $request->input('prenom');
        $etudiant->date_de_naissance= $request->input('date_de_naissance');
        $etudiant->date_inscription= $request->input('date_inscription');
        $etudiant->promo= $request->input('promo');
         
        $etudiant->save();
        return redirect('liste-des-etudiants');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function editEtudpr($id)
    {
        //
        $etudiant = Etudiant::find($id);
        return view('admin.promo_etud',['etudiants'=>$etudiant]);
    }
    public function updateEtudpr(Request $request, $id)
    {
        //
              
       
        if($request->hasFile('photo')){
        $avatar=$request->file('photo');
        $filename=time() . '.' . $avatar->getClientOriginalExtension();
        Image::Make($avatar)->resize(300,300)->save(public_path('/telechargement/avatar/'. $filename));
        $user=Etudiant::find($id);
        $user->photo=$filename;
        $user->save();
      
            }
            $etud = new \stdClass();
        $etud = Etudiant::find($id);      
        $promotion = Promotion::where('libelle_pr',$request->input('promo'))->first();
        
        $etud->nom = $request->input('nom');
        $etud->prenom = $request->input('prenom');
        $etud->date_de_naissance = $request->input('date_de_naissance');
        $etud->date_inscription = $request->input('date_inscription');
        $etud->promo = $promotion->id_pr;
        $etud->save();
      
                 
         
        return redirect()->route('promos.viewEtud', $promotion->libelle_pr)->with('success', 'Data saved');
       
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
}
