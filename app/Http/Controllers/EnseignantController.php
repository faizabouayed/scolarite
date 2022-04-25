<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use resources\view;

class EnseignantController extends Controller
{
    //public function listUserE(){
        //$user = User::all();
        $user=User::where(['role'=>'enseignant'])->get(); 
        return view('admin.index', ['user'=>$user]);    
               // where([$user->role='enseignant']);
             //return grade::make()->hideFromIndex();
    }

    public function create(){
        return view('admin.create');
    }
    public function store(Request $request){
        $User = new User();
        $User->name = $request->input('name');
        $User->prenom = $request->input('prenom');
        $User->date_n = $request->input('date_n');
        $User->grade = $request->input('grade');
        $User->save();
        return redirect('Enseignants-User');

    }
    public function index(){
        //$listUser = User::all();
       $listUser=User::where(['role'=>'enseignant'])->get(); 
        return view('admin.index', ['user' => $listUser]);
    }

    public function editUser(int $user_id)
    {
        $user = User::find($user_id);
        if($user){

            $this->user_id = $user->id;
            $this->name = $user->name;
            $this->email = $user->email;
            $this->course = $user->course;
        }else{
            return redirect()->to('Enseignants-User');
        }
    }


    public function edit($id){
        $user = User::find($id);
        //$user=User::where(['role'=>'enseignant'])->get(); 

        return view('Admin.editEns', ['user'=>$user]);
    }
    public function update(Request $request, $id){
        $User = User::find($id);
       $User->name = $request->input('name');
        $User->prenom = $request->input('prenom');
        $User->date_n = $request->input('date_n');
        $User->grade = $request->input('grade');
        $User->save();
        return redirect('Enseignants-User');        
    }
     public function shwo($id){
        $user = User::find($id);
        return view('admin.show', ['user'=>$user]);
    }
   /* public function Module(){
         $Module = Module::find($id);
         $Module = Module::find($libelle);

    }*/
    
     
    /*public function destroy($id){
        $user = User::find($id);
        $user->delete();
        return redirect('Enseignants-User');
    } 
    public function edit($id){
        $article = User::find($id);
        return view('Enseignants-User.edit', ['article'=>$article]);
    }
    public function delete($id){
        $serv_cate = Servicecategory::findOrFail();
        $serv_cate->delete();

        return response()->json(['status'=>'Service Category Deleted Successfully']);

    }
    public function editUser($id){
        $user = User::find($id);
        return view('Admin.editEns', ['user'=>$user]);
    }
    public function updateUser(Request $request, $id){
        $user = User::find($id);     
        $user->save();
        return redirect('Enseignants-User');        
    }
    public function listUserProfil(){
        $user = User::all();
        return view('Profile-Ens', ['user'=>$user]);    
              
               }
     public function show(User $user){
        
        //$user = User::find($username);
        //dd($id);
        return view('Admin.show',['user'=>$user]);

    }*/
}
