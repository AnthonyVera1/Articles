<?php
use Illuminate\Support\Facades\Route;

//  Controllers
use \App\Http\Controllers\LessonsController;
use \App\Http\Controllers\ArticlesController;

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
    return view('home');
});

/**
 * Une route GET classique qui retourne un contenu
 */
Route::get('salut', function() {
    return 'Salut, je suis une page de test';
});

/**
 * Une route avec un paramètre nécessaire
 */
Route::get('salut/{name}', function($name) {
    return 'Salut ' . ucfirst($name) . ', je suis une page de test avec un paramètre !';
});

/**
 * Une route avec un paramètre optionnel
 */
Route::get('optionnel/{name?}', function($name = null) {
    if( $name === null ) {
        return 'Salut, je ne contiens aucun paramètre';
    }

    return 'Salut, mon paramètre est le suivant : ' . $name;
});

/**
 * Une route avec un paramètre recquis qui doit obligatoirement être un nombre
 */
Route::get('number/{n}', function($n) {
    return $n;
})->where('n', '[0-9]+');

/**
 * Route avec un paramètre recquis qui ne doit contenir que du texte
 */
Route::get('string/{string}', function($string) {
    return $string;
})->where('string', '[a-z]+');

/**
 * Exemple d'une route nommée, quon pourra appeler grâce à la fonction
 * route('home')
 */
Route::get('home', function() {
    return 'Je suis la page d\'accueil';
})->name('home');

/**
 * Exemple de routes groupées
 */
Route::prefix('users')->name('users.')->group(function() {
   Route::get('/', function() {
       return 'Accueil espace membre';
   })->name('index');

   Route::get('/{name}', function($name) {
       return 'Bonjour je suis ' . ucwords(str_replace('-', ' ', $name));
   })->name('show')->where('name', '[a-z]+');
});

/**
 * Réponse automatiquement formatée en JSON
 */
Route::get('json', function() {
    return ['un', 'deux', 'trois', 'quatre'];
});

/**
 * Réponse imposée
 */
Route::get('reponse-de-test', function () {
    return response('une réponse', 503)->header('Content-Type', 'text/plain');
});

/**
 * Première vue affichée depuis une route
 */
Route::get('ma-premiere-vue', function() {
    return view('first_view');
});

/**
 * Première vue avec des paramètres
 */
Route::get('article/{n}', function($n) {
    return view('article')->with('numero', $n);
})->whereNumber('n');

/**
 * Première vue avec des paramètres
 */
Route::get('article/{n}', function($n) {
    return view('article')->with('numero', $n);
})->whereNumber('n');

Route::get('lessons', [LessonsController::class, 'index'])->name('lessons');

Route::prefix('articles')->name('articles.')->group(function() {
    Route::get('/', [ArticlesController::class, 'index'])
        ->name('index');
    Route::get('create', [ArticlesController::class, 'create'])
        ->name('create');
    Route::post('create', [ArticlesController::class, 'createPost'])
        ->name('create');    
    Route::get('{id}', [ArticlesController::class, 'show'])
        ->name('show');
    Route::get('navigate/{id}/{direction}', [ArticlesController::class, 'navigate'])
        ->whereNumber('id')
        ->whereAlpha('direction')
        ->name('navigate');

    Route::post('search', [ArticlesController::class, 'search'])
        ->name('search');
});
