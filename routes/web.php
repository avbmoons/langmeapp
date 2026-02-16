<?php

use App\Http\Controllers\Admin\IndexController as AdminController;
use App\Http\Controllers\Admin\LangsController as AdminLangsController;
use App\Http\Controllers\Admin\ModesController as AdminModesController;
use App\Http\Controllers\Admin\PatternsController as AdminPatternsController;
use App\Http\Controllers\Admin\TasksController as AdminTasksController;
use App\Http\Controllers\Admin\ThemesController as AdminThemesController;
use App\Http\Controllers\Admin\WordsController as AdminWordsController;
use App\Http\Controllers\ModesController;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Route;

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

// Route::get('hello/{name}', static function(string $name): string {
//     return "Hello, {$name}";
// });

//admin routes
Route::group(['prefix' => 'admin', 'as' => 'admin.'], static function() {
    Route::get('/', AdminController::class)
        ->name('index');
    Route::resource('modes', AdminModesController::class);
    Route::resource('langs', AdminLangsController::class);
    Route::resource('themes', AdminThemesController::class);
    Route::resource('words', AdminWordsController::class);
    Route::resource('patterns', AdminPatternsController::class);
    Route::resource('tasks', AdminTasksController::class);

});

Route::group(['prefix' => ''], static function() {
    Route::get('/modes', [ModesController::class, 'index'])
        ->name('modes');

    Route::get('/modes/{id}/show', [ModesController::class, 'show'])
        ->name('modes.show');
});

// Route::get('/modes', [ModesController::class, 'index'])
//     ->name('modes');

// Route::get('/modes/{id}/show', [ModesController::class, 'show'])
//     ->name('modes.show');

