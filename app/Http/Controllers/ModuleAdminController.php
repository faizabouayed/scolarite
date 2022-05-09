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
     public function ListeMod(Request $request){
        
        if ($request->has('trashed')) {
            $listeOpt = Option::all();
            $users=User::where(['role'=>'enseignant'])->get();
            $modules = Module::onlyTrashed()
            ->join('options','options.id_opt','=','modules.option')
            ->join('users','users.id','=','modules.enseignant')
            ->get(); 
        } else {
            $listeOpt = Option::all();
            $users=User::where(['role'=>'enseignant'])->get();
            $modules = Module:: join('options','options.id_opt','=','modules.option')
            ->join('users','users.id','=','modules.enseignant')
            ->get();            
        }
        return view('admin.listeMod',compact('modules','listeOpt','users'));
    }
    public function create()
    {   $listeOpt = Option::all();
        $users=User::where(['role'=>'enseignant'])->get(); 
        return view('admin.createMod',compact('listeOpt','users'));
    }
    public function store(Request $request){
        $module = new Module();      
        $module->libelle = $request->input('libelle');
        $module->code = $request->input('code');
        $module->semestre = $request->input('semestre');
        $module->option = $request->input('option');         
        $module->enseignant = $request->input('enseignant');
        $module->save();
        return redirect('admin.listeMod');
    }
     public function edit($id){
        $module = Module::find($id);
        $listeOpt = Option::all();
        $users=User::where(['role'=>'enseignant'])->get();
        return view('admin.listeMod',compact('listeOpt','users')); 
    }
    public function update(Request $request, $id){
        $module = Module::find($id);
        $module->libelle = $request->input('libelle');
        $module->code = $request->input('code');
        $module->option = $request->input('option');
        $module->enseignant = $request->input('enseignant');
        $module->save();
        return redirect()->back()->with('status','Modules Updated Successfully');        
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
