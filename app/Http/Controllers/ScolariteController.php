<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use resources\view;
use App\Models\Promotion;
use App\Models\Option;
use App\Models\Module;
use Illuminate\Support\Facades\DB;



class ScolariteController extends Controller
{
    //    
    /*public function listUserE(){
        $user=User::where(['role'=>'enseignant'])->get(); 
        return view('admin.listeEnseignants-User', ['users'=>$user]);    
    }
    */
    public function create(){
        return view('admin.create');
    }
    public function store(Request $request){
        $User = new User();
        $User->role = 'enseignant';
        //$User->photo = $request->input('photo');
        $User->name = $request->input('name');
        $User->prenom = $request->input('prenom');
        $User->date_n = $request->input('date_n');
        $User->grade = $request->input('grade');
        $User->email = $request->input('email');
        $User->password = $request->input('password');
        $User->save();
        return redirect('admin.listeEnseignants-User');

    }
    public function index(Request $request){
        if ($request->has('trashed')) {
            $user = User::where(['role'=>'enseignant'])->onlyTrashed()
                ->get();
    
        } else {
            $user = User::where(['role'=>'enseignant'])->get();
        } 
        
            return view('admin.listeEnseignants-User', ['users'=>$user]);
        
    }
    public function edit($id){
        $user = User::find($id);
        return view('admin.listeEnseignants-User', ['users'=>$user]);
    }
    public function update(Request $request, $id){
        $User = User::find($id);
        $User->name = $request->input('name');
        $User->prenom = $request->input('prenom');
        $User->date_n = $request->input('date_n');
        $User->grade = $request->input('grade');
        $User->save();
        return redirect()->back()->with('status','Enseignants Updated Successfully');        
    }
     public function shwo($id){
        $user = User::find($id);
        return view('admin.show', ['users'=>$user]);
    }
    public function destroy($id)
    {
        $user = User::find($id); //delete();
        $user->delete();
 
        return redirect()->back()->with('status','Teacher Deleted Successfully');
    }
    public function supp($id)
    {
        User::onlyTrashed()->find($id)->forceDelete();
 
        return redirect()->back()->with('status','Teacher Deleted Successfully');
    }
    public function restore($id)
    {
        User::withTrashed()->find($id)->restore();
 
        return redirect()->back();
    }
    public function restoreAll()
    {
        User::onlyTrashed()->restore();
 
        return redirect()->back();
    }
    
}
