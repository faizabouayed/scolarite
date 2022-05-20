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




//Route::get('/index','App\Http\Controllers\UserController@index')->name('password.request');

/******************les Enseignants-Users**************/

/*****lister*****/
Route::get('/Enseignants-User', 'App\Http\Controllers\ScolariteController@index')->name('Enseignant-User.index');;
/******ajouter***/
Route::get('/Enseignants-User/create', 'App\Http\Controllers\ScolariteController@create')->name('Enseignants.create');
Route::post('Enseignants-User', 'App\Http\Controllers\ScolariteController@store')->name('Enseignants.store');
/******Modifier****/
Route::get('Enseignants-User/{id}', 'App\Http\Controllers\ScolariteController@edit')->name('Enseignants-User.edit');
Route::put('Enseignants-User/{id}', 'App\Http\Controllers\ScolariteController@update')->name('Enseignants-User.update');
/******View******/
//Route::get('Enseignants-User/{id}/shwo', 'App\Http\Controllers\ScolariteController@shwo')->name('shwo.info');
//Route::get('Enseignants-User/{id}', 'App\Http\Controllers\ScolariteController@viewMod')->name('show.afficher');
Route::get('Enseignants-User/{id}/shwo', 'App\Http\Controllers\ScolariteController@afficher')->name('show.afficher');
/*soft delete*/
Route::delete('Enseignants-User/{id}', 'App\Http\Controllers\ScolariteController@destroy')->name('Enseignants-User.destroy');
/* force delete*/
Route::post('/Enseignants-User/{id}', 'App\Http\Controllers\ScolariteController@supp')->name('Enseignants-User.supp');
/*restorer*/
Route::get('/Enseignants-User/restore/{id}', 'App\Http\Controllers\ScolariteController@restore')->name('Enseignants-User.restore');
/*tout restorer*/
Route::get('/listeEnseignants-User/restore-all', 'App\Http\Controllers\ScolariteController@restoreAll')->name('Enseignants-User.restoreAll');




//******************les Admins-Users**************/
/*****lister*****/
Route::get('/Admin-User', 'App\Http\Controllers\AdminController@index')->name('Admin-User.index');
/******ajouter***/
Route::get('Admin-User/create', 'App\Http\Controllers\AdminController@create')->name('Admin.create');
Route::post('Admin-User', 'App\Http\Controllers\AdminController@store')->name('Admin.store');
/******Modifire****/
Route::get('Admin-User/{id}', 'App\Http\Controllers\AdminController@edit')->name('Admin-User.edit');
Route::put('Admin-User/{id}', 'App\Http\Controllers\AdminController@update')->name('Admin-User.update');

/********delete Admins*******/
/*soft delete*/
Route::delete('/Admin-User/{id}', 'App\Http\Controllers\AdminController@destroy')->name('Admin-User.destroy');
/* force delete*/
Route::post('/Admin-User/{id}', 'App\Http\Controllers\AdminController@supp')->name('Admin-User.supp');
/*restorer*/
Route::get('/Admin-User/restore/{id}', 'App\Http\Controllers\AdminController@restore')->name('Admin-User.restore');
/*tout restorer*/
Route::get('/listeAdmin-User/restore-all', 'App\Http\Controllers\AdminController@restoreAll')->name('Admin-User.restoreAll');

/******************les Listes Modules Admin**************/

/*****lister Modules*****/
Route::get('/module', 'App\Http\Controllers\ModuleAdminController@ListeMod')->name('module.index');
/******ajouter***/

Route::get('/createMod', 'App\Http\Controllers\ModuleAdminController@create')->name('module.create');
Route::post('module', 'App\Http\Controllers\ModuleAdminController@store')->name('module.store');

Route::get('module/{id}', 'App\Http\Controllers\ModuleAdminController@edit')->name('module.edit');
Route::put('module/{id}', 'App\Http\Controllers\ModuleAdminController@update')->name('module.update');

/*soft delete*/
Route::delete('/module/{id}', 'App\Http\Controllers\ModuleAdminController@destroy')->name('module.destroy');
/* force delete*/
Route::post('/module/{id}', 'App\Http\Controllers\ModuleAdminController@supp')->name('module.supp');
/*restorer*/
Route::get('/module/restore/{id}', 'App\Http\Controllers\ModuleAdminController@restore')->name('module.restore');
/*tout restorer*/
Route::get('/listeMod/restore-all', 'App\Http\Controllers\ModuleAdminController@restoreAll')->name('module.restoreAll');


Route::get('/calendrier', function () {
    return view('calendrier');
});

Route::get('/calendrier_en', 'App\Http\Controllers\UserController@calend');

/*Route::get('/calendrier_en', function () {
    return view('calend_enseignant');
});*/
Route::get('/popup', function () {
    return view('popup');
});




/***********************Les options*********************/
Route::get('/options', 'App\Http\Controllers\OptionController@index')->name('option.index');


Route::get('/createOpt', 'App\Http\Controllers\OptionController@create');
Route::post('options', 'App\Http\Controllers\OptionController@store')->name('option.store');

/******Modifire****/
Route::get('options/{id}', 'App\Http\Controllers\OptionController@edit')->name('option.edit');
Route::put('options/{id}', 'App\Http\Controllers\OptionController@update')->name('option.update');
/*soft delete*/
Route::delete('/options/{id_opt}', 'App\Http\Controllers\OptionController@destroy')->name('option.destroy');
/* force delete*/
Route::post('/options/{id_opt}', 'App\Http\Controllers\OptionController@supp')->name('option.supp');
/*restorer*/
Route::get('/options/restore/{id_opt}', 'App\Http\Controllers\OptionController@restore')->name('option.restore');
/*tout restorer*/
Route::get('/listeOpt/restore-all', 'App\Http\Controllers\OptionController@restoreAll')->name('option.restoreAll');


/*master détails option avec promos*/
Route::get('/options/viewPromo/{libelle_opt}', 'App\Http\Controllers\OptionController@viewPromo')->name('option.viewPromo');
/*ajouter une promo dans master details d'option/ promotion */

Route::get('/createprOP/{opt}', 'App\Http\Controllers\PromotionController@createprOP');
Route::post('promotionsopt', 'App\Http\Controllers\PromotionController@storePR')->name('promoOpt.store');

/*modifier une promo dans master details d'option/ promotion */

Route::get('promotionsopt/{id}', 'App\Http\Controllers\PromotionController@editpr')->name('promotions.edit');
Route::put('promotionsopt/{id}', 'App\Http\Controllers\PromotionController@updatepr')->name('promoOpt.update');

/*master détails promo avec étudiants*/
Route::get('/promotions/viewEtud/{libelle_pr}', 'App\Http\Controllers\PromotionController@viewEtud')->name('promos.viewEtud');
/*ajouter un etudiant dans master details promo/etudiants*/
Route::get('/createprEtud/{pr}', 'App\Http\Controllers\EtudiantController@createprEtud');
Route::post('liste-des-etudiantspr', 'App\Http\Controllers\EtudiantController@storeprEtud')->name('etudiantpromo.store');
/*modifier un etudiant dans master details promo/etudiants*/
Route::get('etudiantpromo/{id}', 'App\Http\Controllers\EtudiantController@editEtudpr')->name('etudiantpromo.edit');
Route::put('etudiantpromo/{id}', 'App\Http\Controllers\EtudiantController@updateEtudpr')->name('etudiantpromo.update');


/************************les promotions*****************/
Route::get('/promotions', 'App\Http\Controllers\PromotionController@index')->name('promotions.index');
Route::get('/createPromo', 'App\Http\Controllers\PromotionController@create')->name('promotions.create');
Route::post('promotions', 'App\Http\Controllers\PromotionController@store')->name('promotions.store');
Route::get('promotions/{id}', 'App\Http\Controllers\PromotionController@edit')->name('promotions.edit');
Route::put('promotions/{id}', 'App\Http\Controllers\PromotionController@update')->name('promotions.update');

/****delete promotions*****/
/*soft delete*/
Route::delete('/promotions/{id_pr}', 'App\Http\Controllers\PromotionController@destroy')->name('promotions.destroy');
/* force delete*/
Route::post('/promotions/{id_pr}', 'App\Http\Controllers\PromotionController@supp')->name('promotions.supp');
/*restorer*/
Route::get('/promotions/restore/{id_pr}', 'App\Http\Controllers\PromotionController@restore')->name('promotions.restore');
/*tout restorer*/
Route::get('/listePromo/restore-all', 'App\Http\Controllers\PromotionController@restoreAll')->name('promotions.restoreAll');

/***********************les etudiants ******************/
Route::get('/liste-des-etudiants', 'App\Http\Controllers\EtudiantController@index')->name('etudiants.index');


Route::get('/createEtud', 'App\Http\Controllers\EtudiantController@createEtud')->name('etudiants.create');
Route::post('etudiants', 'App\Http\Controllers\EtudiantController@storeEtud')->name('etudiants.store');
Route::post('liste-des-etudiants/{id_etud}', 'App\Http\Controllers\EtudiantController@edit')->name('etudiants.edit');
Route::put('liste-des-etudiants/{id_etud}', 'App\Http\Controllers\EtudiantController@update')->name('etudiants.update');


/*soft delete */
Route::delete('/liste-des-etudiants/{id_etud}', 'App\Http\Controllers\EtudiantController@destroy')->name('etduiants.destroy');
/*force delete*/
Route::post('/liste-des-etudiants/{id_etud}', 'App\Http\Controllers\EtudiantController@supp')->name('etudiants.supp');
/*********Relever ********/
Route::get('Relever/{id_etud}/{promo}/{option}', 'App\Http\Controllers\EtudiantController@viewRelever')->name('etudiants.relever');

//Route::get('Relever/{id_etud}/relever', 'App\Http\Controllers\EtudiantController@ListeNote')->name('etudiants.notes');

/*******delete Etudiants******/
/*soft delete*/
Route::delete('/liste-des-etudiants/{id_etud}', 'App\Http\Controllers\EtudiantController@destroy')->name('etudiants.destroy');
/* force delete*/
Route::post('/liste-des-etudiants/{id_etud}', 'App\Http\Controllers\EtudiantController@supp')->name('etudiants.supp');
/*restorer*/
Route::get('/liste-des-etudiants/restore/{id_etud}', 'App\Http\Controllers\EtudiantController@restore')->name('etudiants.restore');
/*tout restorer*/
Route::get('/liste-des-etudiants/restore-all', 'App\Http\Controllers\EtudiantController@restoreAll')->name('etudiants.restoreAll');



Route::get('/MenuAdmin', function () {
    return view('MenuAdmin');
});

//Route::get('Enseignants-User/{id}/show', 'App\Http\Controllers\ScolariteController@show')->name('Admin.show');

//Route::get('/Profile-Ens/{id}', 'App\Http\Controllers\ProfileEController@show')->name('Profile-Ens.show');


Route::get('/login', function () {
    return view('auth.login');
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

Route::get('/index', 'App\Http\Controllers\UserController@stat');
/**************************************/
 
/*Route::get('/editprofil', function () {
    return view('editprofil');
}
);*/
/*******************************Coté Enseignants***********/ 
Route::get('/modules/{opt}/{prom}', 'App\Http\Controllers\ModuleController@ListeModules');
//liste des notes des etudiants
 
Route::get('/notes/{id_mod}/{id_pr}', 'App\Http\Controllers\NoteController@ListeNotes')->name('notes.index');

Route::get('notes/{id_nt}', 'App\Http\Controllers\NoteController@edit')->name('note.edit');
Route::put('notes/{id_nt}', 'App\Http\Controllers\NoteController@update')->name('notes.update');



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');






Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


