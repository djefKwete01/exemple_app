<?php

use App\Models\Entrepot;
use App\Models\ElementEntrepot;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\EntrepotController;
use App\Http\Controllers\InstanceController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\MouvementController;
use App\Http\Controllers\EntiteAdminController;
use App\Http\Controllers\TypeMouvementController;
use App\Http\Controllers\ElementEntrepotController;
use App\Http\Controllers\LigneMouvementController;
use App\Http\Controllers\TypeEntiteAdminController;

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

/*
/users  (GET)  : Affichage de tous les éléments     (index)
/users/create  (GET) : Affichage du formulaire de creation  (create)
/users/{user}  (GET)  : Affichage d'un élément                 (show)
/users/{user}/edit  (GET)  :  Modification d'un élément         (update)
/users (POST)       (GET)  :  Ajout de l'élément en base de données   (store)
/users/{user}  (DELETE)    :  Suppression de l'élément                 (destroy)
*/

//Route::resource('users', UserController::class);




Route::get('/home', function(){
    return view('welcome');
});

//Route::get('/find/{id}', [CategorieController::class, 'getCategories']);


/** ___Routes importantes __**/
//Route::resource('categories', CategorieController::class);

//Route::get('/liste/{categorie}', [CategorieController::class, 'liste'])->name('ListeCategorie');

//Route::get('/articles', [ArticleController::class, 'AllArticles'])->name('articles.categorie');

/** ___________________________**/

//Route::get('/entrepots', [ElementEntrepotController::class, 'test'])->name('testEntrepot');

/*------------------------------------------------------------------------*/

/*
/users  (GET)  : Affichage de tous les éléments     (index)
/users/create  (GET) : Affichage du formulaire de creation  (create)
/users/{user}  (GET)  : Affichage d'un élément                 (show)
/users/{user}/edit  (GET)  :  Modification d'un élément         (update)
/users (POST)       (GET)  :  Ajout de l'élément en base de données   (store)
/users/{user}  (DELETE)    :  Suppression de l'élément                 (destroy)
*/



Route::resource('type_entite_admin', TypeEntiteAdminController::class);
Route::resource('entite_admin', EntiteAdminController::class);
Route::resource('entrepot', EntrepotController::class);
Route::resource('categorie', CategorieController::class);
Route::resource('article', ArticleController::class);
Route::resource('instance', InstanceController::class);
Route::resource('type_mouvement', TypeMouvementController::class);
Route::resource('mouvement', MouvementController::class);
Route::resource('ligne_mouvement', LigneMouvementController::class);



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
