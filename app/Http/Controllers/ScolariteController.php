<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use resources\view;
use App\Models\Promotion;
use App\Models\Option;
use App\Models\Module;
use Illuminate\Support\Facades\DB;



class ScolariteController extends Controller
{
    //
    
    public function listUserE(){
        $user=User::where(['role'=>'enseignant'])->get(); 
        return view('admin.index', ['user'=>$user]);    
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
    public function afficher($id) {
        /*$module=DB::table('modules')
        ->join('users','users.id','=','modules.user')
        ->join('options','options.id','=','modules.option')
        ->select('modules.code', 'modules.libelle')
        ->get();
         return view('admin.show',['modules'=>$module]);
        //->join('promotions','promotions.id','=','options.promo')
      //  ->select('code','libelle','niveau')*/
        if(User::where('id',$id)->exists()){
        $user = User::where('id',$id)->first();
        $module = Module::where('user',$user->id)->get();
        return view('admin.show', ['modules' => $module],compact('user','module'));
        }
        else return redirect()->back();
    }
    /*public function editUser(int $user_id)
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
    }*/   
     
    
   
     /*public function show(User $user){
        
        //$user = User::find($username);
        //dd($id);
        return view('Admin.show',['user'=>$user]);

    }*/
}
