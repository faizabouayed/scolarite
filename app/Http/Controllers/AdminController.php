<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use resources\view;

class AdminController extends Controller
{
    //
    public function createAd(){
        return view('admin.createAd');
    }
    public function storeAd(Request $request){
        $User = new User();
        $User->name = $request->input('name');
        $User->prenom = $request->input('prenom');
        $User->date_n = $request->input('date_n');
        $User->save();
        return redirect('Admin-User');

    }
   public function index(Request $request){
        //$listUser = User::all();
        $listUser=User::where(['role'=>'admin'])->get();
        if ($request->has('trashed')) {
            $listUser = User::where(['role'=>'admin'])->onlyTrashed()
                ->get();

        } else {
            $listUser = User::where(['role'=>'admin'])->get();
        } 
        return view('Admin-User', ['user' => $listUser]);
    }
   /* public function index(Request $request)
    {
        $listUser=User::where(['role'=>'admin'])->get(); 
        if ($request->has('trashed')) {
            $listUser = User::onlyTrashed()
                ->get();
        } else {
            $listUser = User::get();
        }
 
        return view('Admin-User', ['user' => $listUser]);
    }*/

    /*public function editUser(int $user_id)
    {
        $user = User::find($user_id);
        if($user){

            $this->user_id = $user->id;
            $this->name = $user->name;
            $this->email = $user->email;
            $this->course = $user->course;
        }else{
            return redirect()->to('Admin-User');
        }
    }*/


    public function edit($id){
        $user = User::find($id);
        //$user=User::where(['role'=>'enseignant'])->get(); 

        return view('Admin.editAd', ['user'=>$user]);
    }
    public function update(Request $request, $id){
        $User = User::find($id);
       $User->name = $request->input('name');
        $User->prenom = $request->input('prenom');
        $User->date_n = $request->input('date_n');
        $User->grade = $request->input('grade');
        $User->save();
        return redirect('Admin-User');        
    }
     
    
     /*public function listUserA(){
        $listUser=User::where(['role'=>'admin'])->get(); 
        if ($request->has('trashed')) {
            $listUser = User::onlyTrashed()
                ->get();
        } else {
            $listUser = User::get();
        }
 
        return view('Admin-User', ['user' => $listUser]);
    }*/
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
