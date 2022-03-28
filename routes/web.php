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

/*Route::get('/apropos', function () {
    return view('ap');
});

Route::get('/abc', function () {
    echo "hello";
});
Route::get('/contact/{name}', function ($name) {
    echo "contact name:".$name;
});

Route::get('/contact/{name}/id/{id}', function ($name, $id) {
    echo"contact name:".$name;
    echo"<br> contact id:".$id;
});

Route::get('/contact/{name}/id/{id}', function ($name, $id) {
    echo"contact name:".$name;
    echo"<br> contact id:".$id;
})->where(['name' => '[a-zA-Z]+', 'id' => '[0-9]+']);

Route::get('/', 'App\Http\Controllers\ArticleController@articles');*/
Route::get('/article/{id}', 'App\Http\Controllers\ArticleController@article');
//Route::get('/addarticle/', 'ArticleController@newArticle');
//Route::get('/listarticle/', 'ArticleController@listArticles');

Route::get('/newArticle', 'App\Http\Controllers\ArticleController@newArticle');
Route::get('/listArticle', 'App\Http\Controllers\ArticleController@listArticles');

Route::get('/accueil', function () {
    return view('accueil');
});
Route::get('/index', function () {
    return view('index');
}); 
Route::get('/Admin-User', function () {
    return view('Admin-User');
});
Route::get('/Enseignants-User', function () {
    return view('Enseignants-User');
});
Route::get('/MenuAdmin', function () {
    return view('MenuAdmin');
});
Route::get('/Profile-Ens', function () {
    return view('Profile-Ens');
});

Route::get('/Releve', function () {
    return view('Releve');
});

Route::get('/login', function () {
    return view('login');
});
Route::get('/options', function () {
    return view('options');
});
Route::get('/promotions', function () {
    return view('promotions');
});
Route::get('/promo', function () {
    return view('promo');
});
Route::get('/promo-etud', function () {
    return view('promo-etud');
});
Route::get('/modules', function () {
    return view('modules');
}
);


Route::get('/modules', function () {
    return view('modules');
}
);
Route::get('/liste-des-etudiants', function () {
    return view('etudiants');
});
 

Route::get('/notes', function () {
    return view('notes');
}
);
 
Route::get('/profile', function () {
    return view('profile');
}
);
 
Route::get('/editprofil', function () {
    return view('editprofil');
}
);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
