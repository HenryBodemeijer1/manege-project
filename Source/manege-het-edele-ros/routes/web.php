<?php
use App\Http\Controllers\HorsesResourceController as HorsesResourceController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ExamController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::view('/welcome', 'welcome');

Auth::routes();
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('lessenLeerling', \App\Http\Controllers\LessenLeerlingController::class);

Route::resource('opmerkingen', \App\Http\Controllers\OpmerkingenController::class);

Route::get('paarden', [App\Http\Controllers\PaardenController::class, 'index']);

Route::resource('user', UserController::class);

Route::middleware(["auth","checkRole:eigenaar"])->group(function(){
    Route::group(["prefix" => "Horses"],function(){
        Route::get("/",[HorsesResourceController::class,"index"])->name("Horses");
        Route::get("/create",[HorsesResourceController::class,"create"])->name("Horses_create");
        Route::post("/store",[HorsesResourceController::class,"store"])->name("Horses_store");
        Route::post("/update",[HorsesResourceController::class,"update"])->name("Horses_update");
        Route::get("show/{id}",[HorsesResourceController::class,"show"])->name("Horses_show");
        Route::get("/{id}/edit",[HorsesResourceController::class,"edit"])->name("Horses_edit");
        Route::get("/destroy/{id}",[HorsesResourceController::class,"destroy"])->name("Horses_delete");
    });

    Route::get('user', [App\Http\Controllers\UserController::class, 'index']);
    Route::resource('lessen', \App\Http\Controllers\LessenController::class);
    Route::get('paarden', [App\Http\Controllers\PaardenController::class, 'index']);
    Route::resource('exam', 'App\Http\Controllers\ExamController');
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('user', UserController::class);
    Route::resource('messages', 'MessageController');
    Route::resource('messages', 'App\Http\Controllers\MessagesController');
});

Route::middleware(["auth","checkRole:eigenaar,instructeur"])->group(function(){
    Route::resource('exam', 'App\Http\Controllers\ExamController');
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('lessen', \App\Http\Controllers\LessenController::class);
    Route::resource('user', UserController::class, ['except' => ['index']]);
});

Route::middleware(["auth","checkRole:eigenaar,instructeur,leerling"])->group(function(){
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('lessen', \App\Http\Controllers\LessenController::class);
    Route::resource('user', UserController::class, ['except' => ['index']]);

});


Route::resource('messages', 'MessageController');
Route::resource('messages', 'App\Http\Controllers\MessagesController');
Route::put('messages/{id}/mark-as-seen', 'MessageController@markAsSeen');
Route::put('messages/{id}/mark-as-seen', 'App\Http\Controllers\MessagesController@markAsSeen');