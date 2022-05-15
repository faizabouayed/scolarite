<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use resources\view;

class AdminController extends Controller
{
    //
    public function create(){
        $listUser=User::where(['role'=>'admin'])->get();
        return view('admin.listeAdmin-User',compact('listUser'));
    }
    public function store(Request $request){

        $request->validate([
                  'name' => ['required','string','max:100'],
                  'prenom' => ['required','string','max:100'],
                 'date_n' => ['required','date'],
                 'email' => ['required'],
                 'password' => ['required','max:10'],
            ]);
        $User = new User();
        $User->role = 'admin';
        $User->name = $request->input('name');
        $User->prenom = $request->input('prenom');
        $User->date_n = $request->input('date_n');
        $User->email = $request->input('email');
        $User->password = $request->input('password');
        $User->save();
        return redirect()->route('Admin-User.index')->with('success', 'Data saved');

    }
   public function index(Request $request){
        $listUser=User::where(['role'=>'admin'])->get();
        if ($request->has('trashed')) {
            $listUser = User::where(['role'=>'admin'])->onlyTrashed()
                ->get();

        } else {
            $listUser = User::where(['role'=>'admin'])->get();
        } 
        return view('admin.listeAdmin-User', ['users' => $listUser]);
    }

    public function edit($id){
        $user = User::find($id);
        return view('admin.listeAdmin-User', ['user'=>$user]);
    }
    public function update(Request $request, $id){
        $User = User::find($id);
        $User->name = $request->input('name');
        $User->prenom = $request->input('prenom');
        $User->date_n = $request->input('date_n');
        $User->save();
        return redirect()->back()->with('status','Admin Updated Successfully');        
    }
    public function destroy($id)
    {
        $user = User::find($id); //delete();
        $user->delete();
 
        return redirect()->back()->with('status','User Deleted Successfully');
    }
    public function supp($id)
    {
        User::onlyTrashed()->find($id)->forceDelete();
 
        return redirect()->back()->with('status','User Deleted Successfully');
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
