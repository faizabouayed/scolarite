<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use resources\view;
use Image;


class EnseignantController extends Controller
{
    //public function listUserE(){
        //$user = User::all();
       // $user=User::where(['role'=>'enseignant'])->get(); 
       // return view('admin.index', ['user'=>$user]);    
               // where([$user->role='enseignant']);
             //return grade::make()->hideFromIndex();
  //  }

    public function create(){
        return view('admin.create');
    }
    public function store(Request $request){
        $User = new User();
       

        if($request->hasFile('photo')){
        $avatar=$request->file('photo');
        $filename=time() . '.' . $avatar->getClientOriginalExtension();
        Image::Make($avatar)->resize(300,300)->save(public_path('/telechargement/avatar/'. $filename));
       
         $User->photo=$filename;
         
      
             }

             
        $User->name = $request->input('name');
        $User->prenom = $request->input('prenom');
        $User->date_n = $request->input('date_n');
        $User->grade = $request->input('grade');
        $User->save();
        return redirect('Enseignants-User');

    }
    public function index(Request $request){
        //$listUser = User::all();
     //  $listUser=User::where(['role'=>'enseignant'])->get(); 
       if ($request->has('trashed')) {
        $listUser = User::where(['role'=>'enseignant'])->onlyTrashed()
            ->get();

    } else {
        $listUser = User::where(['role'=>'enseignant'])->get();
    } 
    
        return view('admin.listeEnseignants', ['user' => $listUser]);
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

        if($request->hasFile('photo')){
        $avatar=$request->file('photo');
        $filename=time() . '.' . $avatar->getClientOriginalExtension();
        Image::Make($avatar)->resize(300,300)->save(public_path('/telechargement/avatar/'. $filename));
        $ser=User::find($id);
        $ser->photo=$filename;
        $ser->save();
      
          }
        $User = User::find($id);
       $User->name = $request->input('name');
        $User->prenom = $request->input('prenom');
        $User->date_n = $request->input('date_n');
        $User->grade = $request->input('grade');
        $User->date_recrutement = $request->input('date_recrutement');

        $User->save();
        return redirect('Enseignants-User');        
    }
     public function shwo($id){
        $user = User::find($id);
        return view('admin.show', ['user'=>$user]);
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
