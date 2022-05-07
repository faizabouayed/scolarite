<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Etudiant;
use App\Models\Option;
use App\Models\Promotion;
use App\Models\Module;
use resources\view;

class UserController extends Controller
{
    //
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
}
