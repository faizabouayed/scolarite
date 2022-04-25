<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Promotion;
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
        $listPromo = Promotion::all();
        if ($request->has('trashed')) {
            $listPromo = Promotion::onlyTrashed()
                ->get();
        } else {
            $listPromo = Promotion::get();
        }
 
        return view('admin.listePromo', ['promotions' => $listPromo]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function viewEtud($libelle, Request $request){
        if(Promotion::where('libelle',$libelle)->exists()){
        $promotion = Promotion::where('libelle',$libelle)->first();
        $etudiants = Etudiant::where('promo',$promotion->id)->get();
        if ($request->has('trashed')) {
            $etudiants = Etudiant::onlyTrashed()->get();
        } else {
            $etudiants = Etudiant::get();
        }
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
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
