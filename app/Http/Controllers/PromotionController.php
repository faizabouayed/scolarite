<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Promotion;
use App\Models\Option;
use Illuminate\Support\Facades\DB;
use App\Models\Etudiant;

class PromotionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /*public function index()
    {
        $listPromo = Promotion::all();
        return view('admin.listePromo', ['promotions' => $listPromo]);
    }*/

    public function index(Request $request)
   
    {	
        $listeOpt = Option::all();
        if ($request->has('trashed')) {
           
            $listPromo = Promotion::onlyTrashed()
            ->join('options','options.id_opt','=','promotions.option')
                ->get();
        } else {
            $listPromo = Promotion::join('options','options.id_opt','=','promotions.option')
            ->get();
            
        }
       //
        return view('admin.listePromo', ['promotions' => $listPromo],['listeOpt' => $listeOpt]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function viewEtud($libelle, Request $request){
       
        if(Promotion::where('libelle_pr',$libelle)->exists()){
            $promotion = Promotion::where('libelle_pr',$libelle)->first();
            if ($request->has('trashed')) {
                $etudiants = Etudiant::where('promo',$promotion->id_pr)::onlyTrashed()
                
                    ->get();
            }
            else {
                $etudiants = Etudiant::where('promo',$promotion->id_pr)->get();
            }
       
        
       /* if ($request->has('trashed')) {
            $etudiants = Etudiant::onlyTrashed()->get();
        } else {
            $etudiants = Etudiant::get();
        }*/
        return view('admin.promo_etud', ['etudiants' => $etudiants],compact('promotion','etudiants'));
        }
        else return redirect()->back();
    }
    public function destroy($id)
    {
        $Promotion = Promotion::find($id); //delete();
        $Promotion->delete();
 
        return redirect()->back()->with('status','Promotion Deleted Successfully');
    }
    public function supp($id)
    {
        Promotion::onlyTrashed()->find($id)->forceDelete();
 
        return redirect()->back()->with('status','Promotion Deleted Successfully');
    }
    public function restore($id)
    {
        Promotion::withTrashed()->find($id)->restore();
 
        return redirect()->back();
    }
    public function restoreAll()
    {
        Promotion::onlyTrashed()->restore();
 
        return redirect()->back();
    }



    public function create()
    { $listeOpt = Option::all();
        return view('admin.listePromo',['listeOpt' => $listeOpt]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
   public function store(Request $request)
    {   $request->validate([
                  'annee_debut' => ['required'],
                 'annee_fin' => ['required'],
            ]);
        
       $promotion = new Promotion();       
       $promotion->option = $request->input('option');
       $promotion->annee_debut = $request->input('annee_debut');
       $promotion->annee_fin = $request->input('annee_fin');
       $r1=Option::where('id_opt',$request->input('option'))->first();
        $promotion->libelle_pr =$r1->libelle_opt.$promotion->annee_debut.'-'.$promotion->annee_fin; 
        $promotion->save();
        return redirect()->route('promotions.index')->with('success','Data saved');
        //dd($request);
    }
    public function createprOP($o)
    { 
        return view('admin.promos',['option' => $o]);
    }
    public function storePR(Request $request)
    {
         $request->validate([
                  'annee_debut' => ['required'],
                 'annee_fin' => ['required'],
            ]);
        $promotion = new Promotion();
        
        $option = Option::where('libelle_opt',$request->input('option'))->first();
       $promotion->option = $option->id_opt;
       $promotion->annee_debut = $request->input('anneeD');
       $promotion->annee_fin = $request->input('anneeF');
     // $promotion->libelle_pr =$x.$promotion->annee;
     // $promotion->annee ='2022';
      //  $promotion->option = $r1;
      // $r1=Option::where('id_opt',$option->id_opt)->first();
        $promotion->libelle_pr =$request->input('option').$promotion->annee_debut.'-'.$promotion->annee_fin;
   
        $promotion->save();
        return redirect()->route('option.viewPromo', $option->libelle_opt)->with('success', 'Data saved');
        //dd($request);
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
        
         $listeOpt = Option::all();
         $promotion = Promotion::find($id);
        return view('admin.listePromo', ['promotions'=>$promotion],['listeOpt' => $listeOpt]);
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
        $promotion = Promotion::find($id);
        $promotion->option = $request->input('option');
        $promotion->annee_debut = $request->input('anneeD');
        $promotion->annee_fin = $request->input('anneeF');
        $r1=Option::where('id_opt',$request->input('option'))->first();
        $promotion->libelle_pr =$r1->libelle_opt.$promotion->annee_debut.'-'.$promotion->annee_fin;    
        $promotion->save();
        return redirect('admin.listePromo')->with('status','Promotions Updated Successfully');        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function editpr($id){
         $promotion = Promotion::find($id);
        return view('admin.promos', ['promo'=>$promotion]);

    }
    public function updatepr(Request $request, $id){
        $promotion = Promotion::find($id);
        
        $option = Option::where('libelle_opt',$request->input('option'))->first();
       $promotion->option = $option->id_opt;
       $promotion->annee_debut = $request->input('anneeD');
       $promotion->annee_fin = $request->input('anneeF');
        $promotion->libelle_pr =$request->input('option').$promotion->annee_debut.'-'.$promotion->annee_fin;
        
        $promotion->save();
        return redirect()->route('option.viewPromo', $option->libelle_opt)->with('status','Promotions Updated Successfully');
    }
}
