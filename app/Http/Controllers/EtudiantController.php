<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Promotion;
use App\Models\Etudiant;

class EtudiantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listEtud = Etudiant::all();
        return view('admin.listeEtud', ['etudiants' => $listEtud]);
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
