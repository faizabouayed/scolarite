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
        $listeOpt = Option::all();
        $users=User::where(['role'=>'enseignant'])->get();
        if ($request->has('trashed')) {
            
            $modules = Module::onlyTrashed()
            ->join('options','options.id_opt','=','modules.option')
            ->join('users','users.id','=','modules.enseignant')
            ->get(); 
        } else {
            
            $modules = Module:: join('options','options.id_opt','=','modules.option')
            ->join('users','users.id','=','modules.enseignant')
            ->get();            
        }
        return view('admin.listeMod',compact('modules','listeOpt','users'));
    }
    public function create()
    {   $listeOpt = Option::all();
        $users=User::where(['role'=>'enseignant'])->get(); 
        return view('admin.listeMod',compact('listeOpt','users'));
    }


   
    public function store(Request $request){
                
                $request->validate([
                  'libelle' => ['required','string','max:250'],
                  'code' => ['required'],
                 'semestre' => ['required'],
                 'option' => ['required'],
                 'enseignant' => ['required'],
            ]);
        $module = new Module();      
        $module->libelle = $request->input('libelle');
        $module->code = $request->input('code');
        $module->semestre = $request->input('semestre');        
        $module->option = $request->input('option');         
        $module->enseignant = $request->input('enseignant');
        $r1=Option::where('id_opt',$request->input('option'))->first();
        $module->code =$r1->libelle_opt.' '.$module->code;
        
        
        if($request->input('tp')){
            $module->tp = 1;
        }
        else {
            $module->tp = 0;
        }
         if($request->input('controle')){
            $module->controle = 1;
        }
        else {
            $module->controle = 0;
        }
        
        $module->save();
        return redirect()->route('module.index')->with('success', 'Data saved');
    }
     /*class PostRequest extends Request
    {
        public function rules(): array
         {
           return [
          'libelle' => 'required|string|max:50',
           'code' => 'required|int|max:3',
           'semestre' => 'required',
           'option' => 'required',
           'enseignant' => 'optional'
            ];
        }
       }*/
     public function edit($id){
        /*$module = Module::find($id);
        $listeOpt = Option::all();
        $users=User::where(['role'=>'enseignant'])->get();*/
        return view('admin.listeMod'); 
    }
    public function update(Request $request, $id){
        $module = Module::find($id);
        $module->libelle = $request->input('libelle');
        $module->code = $request->input('code');
        $module->controle = $request->has('controle');
        $module->examen = $request->has('examen');
        $module->tp = $request->has('tp');
        $module->semestre = $request->input('semestre');
        $module->option = $request->input('option');
        $module->enseignant = $request->input('enseignant');
        $r1=Option::where('id_opt',$request->input('option'))->first();
        $module->code =$r1->libelle_opt.' '.$module->code;
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
