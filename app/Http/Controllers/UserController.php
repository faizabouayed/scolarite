<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Etudiant;
use App\Models\Option;
use App\Models\Promotion;
use App\Models\Module;
use resources\view;
use Hash;
use Session;
use Brian2694\Toastr\Facades\Toastr;
use Auth;
use Image;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    //
    public function afficherInfos()
    {
          
       $b=DB::table('users')
        ->where('id','=',Auth::user()->id)
        ->get();

        $current_year=date('Y');
$m = DB::table('promotions')
/*->join('options','options.id_opt','=','promotions.option')
->join('modules','options.id_opt','=','modules.option')
->where('modules.enseignant',Auth::user()->id)*/
->where('annee_debut',$y=$current_year)
->orWhere('annee_fin',$x=$current_year)
->orderBy('annee_debut','desc')
->distinct('libelle_pr')
->get();

           return view('profile', array('user'=>Auth::user(),'b'=>$b,'m'=>$m));
    }
    public function stat()
    {

       $etudiant=Etudiant::count();
        $option=Option::count();
        $promotion=Promotion::count();
        $module=Module::count();
        $enseignant=User::where(['role'=>'enseignant'])->count();



           $d1='2018';
           $d2='2019';
           $d3='2020';
           $d4='2021';
           $d5='2022';



           $s1 = DB::table('users')
           ->where('role',$e='enseignant')
           ->whereYear('date_recrutement',$d1)
           ->count();
          

           $s2 = DB::table('users')
           ->where('role',$e='enseignant')
           ->whereYear('date_recrutement',$d2)
           ->count();


           $s3 = DB::table('users')
           ->where('role',$e='enseignant')
           ->whereYear('date_recrutement',$d3)
           ->count();
           

           $s4 = DB::table('users')
           ->where('role',$e='enseignant')
           ->whereYear('date_recrutement',$d4)
           ->count();
         
           

           $s5 = DB::table('users')
           ->where('role',$e='enseignant')
           ->whereYear('date_recrutement',$d5)
           ->count();
         
           
         
           $se1 = DB::table('etudiants')
           ->whereYear('date_inscription',$d1)
           ->count();
          

           $se2 = DB::table('etudiants')
           ->whereYear('date_inscription',$d2)
           ->count();


           $se3 = DB::table('etudiants')
           ->whereYear('date_inscription',$d3)
           ->count();
           

           $se4 = DB::table('etudiants')
           ->whereYear('date_inscription',$d4)
           ->count();
         
           

           $se5 = DB::table('etudiants')
           ->whereYear('date_inscription',$d5)
           ->count();
            
            /**********************graph num 2**/
           
          /* $opt_sic=DB::table('options')
           ->select('id_opt')
           ->where('libelle_opt',$p='SIC')
           ->get();

           $promo_opt=DB::table('promotions')
           ->select('id_pr')
           ->where('option',$opt_sic)
           ->get(); 

           $etud=DB::table('etudiants')
           ->where('promo',$promo_opt)
           ->count();*/
             
         
        $etud_sic=DB::table('promotions')
        ->join('etudiants','promotions.id_pr','=','etudiants.promo')
        ->join('options','promotions.option','=','options.id_opt')
        ->where('options.libelle_opt',$ss='SIC')
        ->count();
         $etud_gl=DB::table('promotions')
        ->join('etudiants','promotions.id_pr','=','etudiants.promo')
        ->join('options','promotions.option','=','options.id_opt')
        ->where('options.libelle_opt',$ss='GL')
        ->count();
         $etud_mid=DB::table('promotions')
        ->join('etudiants','promotions.id_pr','=','etudiants.promo')
        ->join('options','promotions.option','=','options.id_opt')
        ->where('options.libelle_opt',$ss='MID')
        ->count();
         $etud_rsd=DB::table('promotions')
        ->join('etudiants','promotions.id_pr','=','etudiants.promo')
        ->join('options','promotions.option','=','options.id_opt')
        ->where('options.libelle_opt',$ss='RSD')
        ->count();

          
          // return view('profile', ['info'=>$b]);
    return view('index', compact('s1','s2','s3','s4','s5','se1','se2','se3','se4','se5','etud_sic','etud_gl','etud_mid','etud_rsd','etudiant','enseignant','option','promotion','module'));
    }
    public function afficherInfosMenu()
    {
          // echo"affichage du user".$id; 
           //$b = User::where('id',$id)->get();
          
          // return view('profile', ['info'=>$b]);
           return view('modules', array('use'=>Auth::user()));
    }
    public function afficherInfos2($id)
    {
          // echo"affichage du user".$id; 
      $b=DB::table('users')
        ->where('id','=',Auth::user()->id)
        ->get();

        $current_year=date('Y');
        $m = DB::table('promotions')
        /*->join('options','options.id_opt','=','promotions.option')
        ->join('modules','options.id_opt','=','modules.option')
        ->where('modules.enseignant',Auth::user()->id)*/
        ->where('annee_debut',$y=$current_year)
        ->orWhere('annee_fin',$x=$current_year)
        ->orderBy('annee_debut','desc')
        ->distinct('libelle_pr')
        ->get();
           $b2 = User::where('id',$id)->get();
           return view('editprofil',compact('b2','b','m'));

    }

    public function update_photo(Request $request)
    {$b=DB::table('users')
        ->where('id','=',Auth::user()->id)
        ->get();
        $current_year=date('Y');
$m = DB::table('promotions')
/*->join('options','options.id_opt','=','promotions.option')
->join('modules','options.id_opt','=','modules.option')
->where('modules.enseignant',Auth::user()->id)*/
->where('annee_debut',$y=$current_year)
->orWhere('annee_fin',$x=$current_year)
->orderBy('annee_debut','desc')
->distinct('libelle_pr')
->get();
        

       if($request->hasFile('avatar')){
        $avatar=$request->file('avatar');
        $filename=time() . '.' . $avatar->getClientOriginalExtension();
        Image::Make($avatar)->resize(300,300)->save(public_path('/telechargement/avatar/'. $filename));
        $user=Auth::user();
        $user->photo=$filename;
        $user->save();
               }   

               return view('profile', array('user'=>Auth::user(),'b'=>$b,'m'=>$m));
   
    }
     public function update(Request $request, $id)
    {
    

        $r=User::find($id);
        $r->prenom=$request->input('prenom');
                $r->name=$request->input('nom');
                        $r->email=$request->input('email');
                         $r->grade=$request->input('grade');
                         $r->password = bcrypt($request->input('password')); 




        $r->save();
        return redirect('profile')->with("Vos informations ont été bien modifié"); 

    }
     public function index()
    {
        // code...
        $etudiant=Etudiant::count();
        $option=Option::count();
        $promotion=Promotion::count();
        $module=Module::count();
        $enseignant=User::where(['role'=>'enseignant'])->count();
        return view('index',compact('etudiant','enseignant','option','promotion','module'));
    }
     public function calend(){
        $b=DB::table('users')
        ->where('id','=',Auth::user()->id)
        ->get();
        $current_year=date('Y');
        $current_year=date('Y');
        $m = DB::table('promotions')
        /*->join('options','options.id_opt','=','promotions.option')
        ->join('modules','options.id_opt','=','modules.option')
        ->where('modules.enseignant',Auth::user()->id)*/
        ->where('annee_debut',$y=$current_year)
        ->orWhere('annee_fin',$x=$current_year)
        ->orderBy('annee_debut','desc')
        ->distinct('libelle_pr')
        ->get();

         return view('calend_enseignant',compact('b','m'));
      }




      public function lockScreen($id)
      {
        $ens=User::
        where('id','=',$id)
        ->get();
          return view('Lockscreen',['ens' => $ens]);
      }
      
      // unlock screen
      public function unlock(Request $request)
      {
          $request->validate([
              'password' => 'required|string',
          ]);
          $check = Hash::check($request->input('password'), $request->user()->password);
  
          if(!$check)
          {
              Toastr::error('fail, Your password does not match :)','Error');
              return redirect()->route('Lockscreen');
          }
          session(['lock-expires-at' => now()->addMinutes($request->user())]);
          return redirect('calendrier_en');
      }



      
}
