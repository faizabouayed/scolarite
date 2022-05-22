<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\EmailController;
use App\Models\User;
use resources\view;
use App\Models\Promotion;
use App\Models\Option;
use App\Models\Module;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\email;
use Image;



class EnseignantController extends Controller
{
    /*public function shwo($id){
        $use = User::where(['role'=>'enseignant'])->get();
        $modules=DB::table('modules')
            ->join('users','users.id','=','modules.enseignant')
            ->where('modules.enseignant',$i=$id)
            ->get();
        return redirect('admin.createPromOPT', compact('use','modules'));
    }
    public function viewMod($name, Request $request){
       
        if(User::where('name',$name)->exists()){
            $enseignant = User::where('name',$name)->first();
            if ($request->has('trashed')) {
                $modules = Module::where('enseignant',$enseignant->id)::onlyTrashed()
                
                    ->get();
            }
            else {
                $modules = Module::where('enseignant',$enseignant->id)
                ->get();
            }

        return view('admin.show', ['modules' => $modules],compact('enseignant','modules'));
        }
        else return redirect()->back();
    }*/
    public function afficher($id) {
      $user= User::where(['role'=>'enseignant'])->get();
        $modules=DB::table('modules')
            ->join('users','users.id','=','modules.enseignant')
            ->where('modules.enseignant',$i=$id)
            ->get();
         $user = User::where('id',$id)->first();
         return view('admin.show',compact('user','modules'));
        //->join('promotions','promotions.id','=','options.promo')
      //  ->select('code','libelle','niveau')*/
        /*if(User::where('id',$id)->exists()){
        $user = User::where('id',$id)->first();
        $module = Module::where('user',$user->id)->get();
        return view('admin.show', ['modules' => $module],compact('user','module'));
        }
        else return redirect()->back();*/
    }
    public function create(){
        $listUser=User::where(['role'=>'enseignant'])->get();
        return view('admin.listeEnseignants-User',compact('listUser'));
    }
    public function store(Request $request){
        $request->validate([
                  'name' => ['required','string','max:255'],
                  'prenom' => ['required','string','max:255'],
                 'date_n' => ['required','date'],
                 'grade' => ['required'],
                 'email' => ['required'],
                 'password' => ['required'],
            ]);
        $User = new User();
         if($request->hasFile('photo')){
        $avatar=$request->file('photo');
        $filename=time() . '.' . $avatar->getClientOriginalExtension();
        Image::Make($avatar)->resize(300,300)->save(public_path('/telechargement/avatar/'. $filename));

         $User->photo=$filename;


             }
        $User->role = 'enseignant';
        //$User->photo = $request->input('photo');
        $User->name = $request->input('name');
        $User->prenom = $request->input('prenom');
        $User->date_n = $request->input('date_n');
        $User->date_recrutement = $request->input('date_recrutement');
        $User->grade = $request->input('grade');
        $User->email = $request->input('email');
        $User->password = bcrypt($request->input('password'));
       // $User->d=md5($User->password);
      $result=((new EmailController)->sendEmail($request));
      
      
        $User->save();
        return redirect()->route('Enseignant-User.index')->with('success', 'Data saved');

    }


    
    public function index(Request $request){
        if ($request->has('trashed')) {
            $user = User::where(['role'=>'enseignant'])->onlyTrashed()
                ->get();
                $module=DB::table('modules')
            ->join('users','users.id','=','modules.enseignant')
            ->join('options','options.id_opt','=','modules.option')
            ->get();
    
        } else {
            $user = User::where(['role'=>'enseignant'])->get();
            $module=DB::table('modules')
            ->join('users','users.id','=','modules.enseignant')
            ->join('options','options.id_opt','=','modules.option')
            ->get();
        } 
            
            
      
            return view('admin.listeEnseignants-User', ['users'=>$user],['modules'=>$module]);
        
    }
    public function edit($id){
        $user = User::find($id);
        return view('admin.listeEnseignants-User', ['users'=>$user]);
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
        $User->date_recrutement = $request->input('date_recrutement');
        $User->grade = $request->input('grade');
        $User->save();
        return redirect()->back()->with('status','Enseignants Updated Successfully');        
    }
     /*public function shwo($id){
        $user = User::find($id);
        return view('admin.show', ['users'=>$user]);
    }*/
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
