<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use resources\view;

class AdminController extends Controller
{
    //
    public function createAd(){
        $listUser=User::where(['role'=>'admin'])->get();
        return view('admin.createAd',compact('listUser'));
    }
    public function storeAd(Request $request){
        $User = new User();
        $User->role = 'admin';
        $User->name = $request->input('name');
        $User->prenom = $request->input('prenom');
        $User->date_n = $request->input('date_n');
        $User->email = $request->input('email');
        $User->password = bcrypt($request->input('password'));
        $User->save();
        return redirect('admin.listeAdmin-User');

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
