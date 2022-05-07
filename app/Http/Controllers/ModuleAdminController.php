<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Module;
use App\Models\Option;
use App\Models\User;
use App\Models\Promotion;

use resources\view;
use Illuminate\Support\Facades\DB;


class ModuleAdminController extends Controller
{
    //
     public function ListeMod(){

        $module=DB::table('modules')
        ->join('options','options.id_opt','=','modules.option')
        ->join('users','users.id','=','modules.enseignant')
        ->join('promotions','options.id_opt','=','promotions.option')
        ->get();  
        return view('admin.listeMod',['modules'=>$module]);
    }
    /*public function ListeMod(Request $request){
        $module=DB::table('modules')
        ->join('options','options.id','=','modules.option')
        ->join('users','users.id','=','modules.user')
        ->join('promotions','options.id','=','promotions.option')
        ->get();  
        if ($request->has('trashed')) {
            $module = Module::onlyTrashed()
                ->get();
        } else {
            $module = Module::get();
        }
        return view('admin.listeMod',['modules'=>$module]);
    }*/
    public function create()
    {   $listeOpt = Option::all();
        $listePromo = Promotion::all();
        $users=User::where(['role'=>'enseignant'])->get(); 
        return view('admin.createMod',compact('listeOpt','users','listePromo'));
    }
    public function store(Request $request){
        $module = new Module();      
        $module->libelle = $request->input('libelle');
        $module->code = $request->input('code');
        //$module->semestre = $request->input('semestre');
        $module->option = $request->input('option');         
        $module->enseignant = $request->input('enseignant');
        $module->save();
        return redirect('module');
    }
    public function edit($id){
        $module = Module::find($id);
        $listeOpt = Option::all();
        $listePromo = Promotion::all();
        $users=User::where(['role'=>'enseignant'])->get();
        return view('module',compact('listeOpt','users','listePromo')); 
    }
    public function update(Request $request, $id){
        $module = Module::find($id);
        $module->libelle = $request->input('libelle');
        $module->code = $request->input('code');
        $module->option = $request->input('option');
        $module->enseignant = $request->input('enseignant');
        $module->save();
        return redirect('module');        
    }
    public function destroy($id)
    {
        $module = Module::find($id); //delete();
        $module->delete();
 
        return redirect()->back()->with('status','Module Deleted Successfully');
    }
    public function supp($id)
    {
        Module::onlyTrashed()->find($id)->forceDelete();
 
        return redirect()->back()->with('status','Module Deleted Successfully');
    }
    public function restore($id)
    {
        Module::withTrashed()->find($id)->restore();
 
        return redirect()->back();
    }
    public function restoreAll()
    {
        Module::onlyTrashed()->restore();
 
        return redirect()->back();
    }

}
