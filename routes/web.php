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




Route::get('/index', function () {
    return view('index');
}); 
/*Route::get('/Admin-User', function () {
    return view('Admin-User');
});*/

/*Route::get('/Enseignants-User', function () {
    return view('Enseignants-User');
});*/
/******************les Enseignants-Users**************/
/*****lister*****/
Route::get('/Enseignants-User', 'App\Http\Controllers\ScolariteController@listUserE');
/******ajouter***/
Route::get('/Enseignants-User/create', 'App\Http\Controllers\ScolariteController@create');
Route::post('Enseignants-User', 'App\Http\Controllers\ScolariteController@store');
Route::get('/Enseignants-User', 'App\Http\Controllers\ScolariteController@index');
/******Modifier****/
Route::get('Enseignants-User/{id}/editEns', 'App\Http\Controllers\ScolariteController@edit');
Route::put('Enseignants-User/{id}', 'App\Http\Controllers\ScolariteController@update');
/******View******/
Route::get('Enseignants-User/{id}/shwo', 'App\Http\Controllers\ScolariteController@shwo')->name('shwo.info');
Route::get('Enseignants-User/{id}/shwo', 'App\Http\Controllers\ScolariteController@afficher')->name('show.afficher');




 //afficher liste des modules 
Route::get('/modules', 'App\Http\Controllers\ModuleController@ListeModules');

Route::get('/calendrier', function () {
    return view('calendrier');
});
Route::get('/popup', function () {
    return view('popup');
});

/******************les Admins-Users**************/
/*****lister*****/
Route::get('/Admin-User', 'App\Http\Controllers\AdminController@listUserA');
/******ajouter***/
Route::get('/Admin-User/createAd', 'App\Http\Controllers\AdminController@createAd');
Route::post('Admin-User', 'App\Http\Controllers\AdminController@storeAd');
Route::get('/Admin-User', 'App\Http\Controllers\AdminController@index')->name('Admin-User.index');
/******Modifire****/
Route::get('Admin-User/{id}/editAd', 'App\Http\Controllers\AdminController@edit');
Route::put('Admin-User/{id}', 'App\Http\Controllers\AdminController@update');


/*Route::delete('Enseignants-User/{id}', 'App\Http\Controllers\ScolariteController@destroy');
//Route::get('Enseignants-User/{id}/avgrund', 'App\Http\Controllers\ScolariteController@edit');
Route::delete('/Enseignants-User-delete/{id}', 'App\Http\Controllers\ScolariteController@delete');
//Route::get('Enseignants-User/{id}/edit', 'App\Http\Controllers\ScolariteController@editUser');
//Route::put('Enseignants-User/{id}', 'App\Http\Controllers\ScolariteController@updateUser');*/


Route::get('/MenuAdmin', function () {
    return view('MenuAdmin');
});
Route::get('/liste_etudiants', function () {
    return view('liste_etudiants');
});
Route::get('/Profile-Ens', function () {
    return view('Profile-Ens');
});
//Route::get('Enseignants-User/{id}/show', 'App\Http\Controllers\ScolariteController@show')->name('Admin.show');

//Route::get('/Profile-Ens/{id}', 'App\Http\Controllers\ProfileEController@show')->name('Profile-Ens.show');


Route::get('/Releve', function () {
    return view('Releve');
});

Route::get('/login', function () {
    return view('login');
});

 
/*******************/

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
 
Route::get('/editprofil', function () {
    return view('editprofil');
}
);

//Route::get('/modules', 'App\Http\Controllers\ModuleController@ListeModules');
//liste des notes des etudiants
 
Route::get('/notes/{id_mod}/{id_pr}', 'App\Http\Controllers\NoteController@ListeNotes');
/* option*/
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
/*promotion */
Route::get('/promotions', 'App\Http\Controllers\PromotionController@index')->name('promotions.index');
/*etudiant */
Route::get('/liste-des-etudiants', 'App\Http\Controllers\EtudiantController@index')->name('etudiants.index');
/*soft delete */
Route::delete('/liste-des-etudiants/{id_etud}', 'App\Http\Controllers\EtudiantController@destroy')->name('etduiants.destroy');
/*force delete*/
Route::post('/liste-des-etudiants/{id_etud}', 'App\Http\Controllers\EtudiantController@supp')->name('etudiants.supp');



/*****************delete promotions***************/
/*soft delete*/
Route::delete('/promotions/{id_pr}', 'App\Http\Controllers\PromotionController@destroy')->name('promotions.destroy');
/* force delete*/
Route::post('/promotions/{id_pr}', 'App\Http\Controllers\PromotionController@supp')->name('promotions.supp');
/*restorer*/
Route::get('/promotions/restore/{id_pr}', 'App\Http\Controllers\PromotionController@restore')->name('promotions.restore');
/*tout restorer*/
Route::get('/promotions/restore-all', 'App\Http\Controllers\PromotionController@restoreAll')->name('promotions.restoreAll');

/*****************delete Etudiants***************/
/*soft delete*/
Route::delete('/etudiants/{id_etud}', 'App\Http\Controllers\EtudiantController@destroy')->name('etudiants.destroy');
/* force delete*/
Route::post('/etudiants/{id_etud}', 'App\Http\Controllers\EtudiantController@supp')->name('etudiants.supp');
/*restorer*/
Route::get('/etudiants/restore/{id_etud}', 'App\Http\Controllers\EtudiantController@restore')->name('etudiants.restore');
/*tout restorer*/
Route::get('/etudiants/restore-all', 'App\Http\Controllers\EtudiantController@restoreAll')->name('etudiants.restoreAll');

/*****************delete Admins***************/
/*soft delete*/
Route::delete('/Admin-User/{id}', 'App\Http\Controllers\AdminController@destroy')->name('Admin-User.destroy');
/* force delete*/
Route::post('/Admin-User/{id}', 'App\Http\Controllers\AdminController@supp')->name('Admin-User.supp');
/*restorer*/
Route::get('/Admin-User/restore/{id}', 'App\Http\Controllers\AdminController@restore')->name('Admin-User.restore');
/*tout restorer*/
Route::get('/Admin-User/restore-all', 'App\Http\Controllers\AdminController@restoreAll')->name('Admin-User.restoreAll');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');




Route::get('/createPromo', 'App\Http\Controllers\PromotionController@create');
Route::post('promotions', 'App\Http\Controllers\PromotionController@store');
