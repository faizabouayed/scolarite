<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});




Route::get('/index','App\Http\Controllers\UserController@index');

/******************les Enseignants-Users**************/

/*****lister*****/
Route::get('/Enseignants-User', 'App\Http\Controllers\ScolariteController@listUserE');
/******ajouter***/
Route::get('/Enseignants-User/create', 'App\Http\Controllers\ScolariteController@create');
Route::post('Enseignants-User', 'App\Http\Controllers\ScolariteController@store');
/******Modifier****/
Route::get('Enseignants-User/{id}/editEns', 'App\Http\Controllers\ScolariteController@edit')->name('Enseignants-User.edit');
Route::put('Enseignants-User/{id}', 'App\Http\Controllers\ScolariteController@update')->name('Enseignants-User.update');
/******View******/
Route::get('Enseignants-User/{id}/shwo', 'App\Http\Controllers\ScolariteController@shwo')->name('shwo.info');
Route::get('Enseignants-User/{id}/shwo', 'App\Http\Controllers\ScolariteController@afficher')->name('show.afficher');


//******************les Admins-Users**************/
/*****lister*****/
Route::get('/Admin-User', 'App\Http\Controllers\AdminController@index')->name('Admin-User.index');
/******ajouter***/
Route::get('/Admin-User/createAd', 'App\Http\Controllers\AdminController@createAd');
Route::post('Admin-User', 'App\Http\Controllers\AdminController@storeAd');
/******Modifire****/
Route::get('Admin-User/{id}/editAd', 'App\Http\Controllers\AdminController@edit');
Route::put('Admin-User/{id}', 'App\Http\Controllers\AdminController@update');

/********delete Admins*******/
/*soft delete*/
Route::delete('/Admin-User/{id}', 'App\Http\Controllers\AdminController@destroy')->name('Admin-User.destroy');
/* force delete*/
Route::post('/Admin-User/{id}', 'App\Http\Controllers\AdminController@supp')->name('Admin-User.supp');
/*restorer*/
Route::get('/Admin-User/restore/{id}', 'App\Http\Controllers\AdminController@restore')->name('Admin-User.restore');
/*tout restorer*/
Route::get('/Admin-User/restore-all', 'App\Http\Controllers\AdminController@restoreAll')->name('Admin-User.restoreAll');

/******************les Listes Modules Admin**************/

/*****lister Modules*****/
Route::get('/module', 'App\Http\Controllers\ModuleAdminController@ListeMod')->name('module.index');
/******ajouter***/
Route::get('/module/createMod', 'App\Http\Controllers\ModuleAdminController@create');
Route::post('module', 'App\Http\Controllers\ModuleAdminController@store');

/*soft delete*/
Route::delete('/module/{id}', 'App\Http\Controllers\ModuleController@destroy')->name('module.destroy');
/* force delete*/
Route::post('/module/{id}', 'App\Http\Controllers\ModuleController@supp')->name('module.supp');
/*restorer*/
Route::get('/module/restore/{id}', 'App\Http\Controllers\ModuleController@restore')->name('module.restore');
/*tout restorer*/
Route::get('/module/restore-all', 'App\Http\Controllers\ModuleController@restoreAll')->name('module.restoreAll');


Route::get('/calendrier', function () {
    return view('calendrier');
});
Route::get('/popup', function () {
    return view('popup');
});


/***********************Les options*********************/
Route::get('/options', 'App\Http\Controllers\OptionController@index')->name('options.index');
Route::get('/createOpt', 'App\Http\Controllers\OptionController@create');
Route::post('options', 'App\Http\Controllers\OptionController@store');
/*soft delete*/
Route::delete('/options/{id_opt}', 'App\Http\Controllers\OptionController@destroy')->name('options.destroy');
/* force delete*/
Route::post('/options/{id_opt}', 'App\Http\Controllers\OptionController@supp')->name('options.supp');
/*restorer*/
Route::get('/options/restore/{id_opt}', 'App\Http\Controllers\OptionController@restore')->name('options.restore');
/*tout restorer*/
Route::get('/options/restore-all', 'App\Http\Controllers\OptionController@restoreAll')->name('options.restoreAll');


/*master détails option avec promos*/
Route::get('/options/viewPromo/{libelle_opt}', 'App\Http\Controllers\OptionController@viewPromo')->name('options.viewPromo');

/*master détails promo avec étudiants*/
Route::get('/promotions/viewEtud/{libelle_pr}', 'App\Http\Controllers\PromotionController@viewEtud')->name('promos.viewEtud');


/************************les promotions*****************/
Route::get('/promotions', 'App\Http\Controllers\PromotionController@index')->name('promotions.index');
Route::get('/createPromo', 'App\Http\Controllers\PromotionController@create');
Route::post('promotions', 'App\Http\Controllers\PromotionController@store');

/****delete promotions*****/
/*soft delete*/
Route::delete('/promotions/{id_pr}', 'App\Http\Controllers\PromotionController@destroy')->name('promotions.destroy');
/* force delete*/
Route::post('/promotions/{id_pr}', 'App\Http\Controllers\PromotionController@supp')->name('promotions.supp');
/*restorer*/
Route::get('/promotions/restore/{id_pr}', 'App\Http\Controllers\PromotionController@restore')->name('promotions.restore');
/*tout restorer*/
Route::get('/promotions/restore-all', 'App\Http\Controllers\PromotionController@restoreAll')->name('promotions.restoreAll');



/***********************les etudiants ******************/
Route::get('/liste-des-etudiants', 'App\Http\Controllers\EtudiantController@index')->name('etudiants.index');

Route::get('/etudiants/createEtud', 'App\Http\Controllers\EtudiantController@createEtud');
Route::post('etudiants', 'App\Http\Controllers\EtudiantController@storeEtud');

/*soft delete */
Route::delete('/liste-des-etudiants/{id_etud}', 'App\Http\Controllers\EtudiantController@destroy')->name('etduiants.destroy');
/*force delete*/
Route::post('/liste-des-etudiants/{id_etud}', 'App\Http\Controllers\EtudiantController@supp')->name('etudiants.supp');
/*********Relever ********/
Route::get('Relever/{id_etud}/relever', 'App\Http\Controllers\EtudiantController@viewRelever')->name('etudiants.relever');

//Route::get('Relever/{id_etud}/relever', 'App\Http\Controllers\EtudiantController@ListeNote')->name('etudiants.notes');

/*******delete Etudiants******/
/*soft delete*/
Route::delete('/etudiants/{id_etud}', 'App\Http\Controllers\EtudiantController@destroy')->name('etudiants.destroy');
/* force delete*/
Route::post('/etudiants/{id_etud}', 'App\Http\Controllers\EtudiantController@supp')->name('etudiants.supp');
/*restorer*/
Route::get('/etudiants/restore/{id_etud}', 'App\Http\Controllers\EtudiantController@restore')->name('etudiants.restore');
/*tout restorer*/
Route::get('/etudiants/restore-all', 'App\Http\Controllers\EtudiantController@restoreAll')->name('etudiants.restoreAll');



Route::get('/MenuAdmin', function () {
    return view('MenuAdmin');
});

//Route::get('Enseignants-User/{id}/show', 'App\Http\Controllers\ScolariteController@show')->name('Admin.show');

//Route::get('/Profile-Ens/{id}', 'App\Http\Controllers\ProfileEController@show')->name('Profile-Ens.show');


Route::get('/login', function () {
    return view('login');
});

 
/*********Les photes de user profile**********/

 //afficher la photo du user
Route::get('/profile', 'App\Http\Controllers\UserController@afficherInfos');

Route::post('/profile', 'App\Http\Controllers\UserController@update_photo');

//changer la photo 

Route::post('/editprofil/{id}', 'App\Http\Controllers\UserController@update_photo');

//editer profile 

Route::get('/editprofil/{id}', 'App\Http\Controllers\UserController@afficherInfos2');

//modifier profile information
Route::put('update_data/{id}', 'App\Http\Controllers\UserController@update');


/**************************************/
 
/*Route::get('/editprofil', function () {
    return view('editprofil');
}
);*/
/*******************************Coté Enseignants***********/ 
//Route::get('/modules', 'App\Http\Controllers\ModuleController@ListeModules');
//liste des notes des etudiants
 
Route::get('/notes/{id_mod}/{id_pr}', 'App\Http\Controllers\NoteController@ListeNotes');



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');





