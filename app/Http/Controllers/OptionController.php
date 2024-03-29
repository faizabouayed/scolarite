<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Option;
use App\Models\Promotion;
use App\Http\Controllers\PromotionController;

class OptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $listOption = Option::all();
        if ($request->has('trashed')) {
            $listOption = Option::onlyTrashed()
                ->get();
        } else {
            $listOption = Option::get();
        }
 
        return view('admin.listeOpt', ['options' => $listOption]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.listeOpt');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
   public function store(Request $request)
    {
         $request->validate([
                  'libelle_opt' => ['required','string','max:100'],
                  'niveau' => ['required'],
                 
            ]);
       $option = new Option();
        $option->id_opt = $request->input('id_opt'); 
        $option->libelle_opt = $request->input('libelle_opt');
        $option->niveau = $request->input('niveau');
        $option->save();
        return redirect()->route('option.index')->with('success', 'Data saved');
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
        $option = Option::find($id);
        return view('admin.listeOpt',['options'=>$option]);
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
        $option = Option::find($id);
        $option->libelle_opt = $request->input('libelle_opt');
        $option->niveau = $request->input('niveau');
        $option->save();
        return redirect()->back()->with('status','Option Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $option = Option::find($id); //delete();
        $option->delete();
 
        return redirect()->back()->with('status','Option Deleted Successfully');
    }
    public function supp($id)
    {
        Option::onlyTrashed()->find($id)->forceDelete();
 
        return redirect()->back()->with('status','Option Deleted Successfully');
    }
    public function restore($id)
    {
        Option::withTrashed()->find($id)->restore();
 
        return redirect()->back();
    }
    public function restoreAll()
    {
        Option::onlyTrashed()->restore();
 
        return redirect()->back();
    }
    public function viewPromo($libelle,Request $request){
        if(Option::where('libelle_opt',$libelle)->exists()){
        $option = Option::where('libelle_opt',$libelle)->first();
       // $result=((new PromotionController)->createPR($option));

        if ($request->has('trashed')) {
        $promos = Promotion::where('option',$option->id_opt)::onlyTrashed()->get();
        }
        else {
            $promos = Promotion::where('option',$option->id_opt)->get();
        }
        return view('admin.promos', ['promos' => $promos],compact('option','promos'));
        }
        else return redirect()->back();
    }
}
