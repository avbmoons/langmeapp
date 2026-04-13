<?php

use App\Http\Controllers\Admin\IndexController as AdminController;
use App\Http\Controllers\Admin\HomeController as AdminHomeController;
use App\Http\Controllers\Admin\LangsController as AdminLangsController;
use App\Http\Controllers\Admin\LexiconsController as AdminLexiconsController;
use App\Http\Controllers\Admin\ModesController as AdminModesController;
use App\Http\Controllers\Admin\PatternsController as AdminPatternsController;
use App\Http\Controllers\Admin\TasksController as AdminTasksController;
use App\Http\Controllers\Admin\ThemesController as AdminThemesController;
use App\Http\Controllers\Admin\WordsController as AdminWordsController;
use App\Http\Controllers\Admin\UsersController as AdminUsersController;
use App\Http\Controllers\Admin\ImportLogsController as AdminImportLogsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TaskChoiceController;
use App\Http\Controllers\TaskPlainController;
use App\Http\Controllers\TaskLangController;
use App\Http\Controllers\TaskMixController;
use App\Http\Controllers\AboutController;

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
    return view('index');
});

Route::group(['prefix' => 'admin', 'as' => 'admin.'], static function() {
    Route::get('/', AdminController::class)
        ->name('index');
    Route::resource('home', AdminHomeController::class);
    Route::resource('langs', AdminLangsController::class);
    Route::resource('lexicons', AdminLexiconsController::class);
    Route::resource('modes', AdminModesController::class);
    Route::resource('patterns', AdminPatternsController::class);
    Route::resource('tasks', AdminTasksController::class);
    Route::resource('themes', AdminThemesController::class);
    Route::resource('words', AdminWordsController::class);
    Route::resource('users', AdminUsersController::class);
    Route::resource('importlogs', AdminImportLogsController::class);
});

Route::group(['prefix' => ''], static function() {
    Route::get('/home', [HomeController::class, 'index'])
    ->name('home');
    Route::get('/taskChoice', [TaskChoiceController::class, 'index'])->name('taskChoice');
    Route::get('/taskPlain', [TaskPlainController::class, 'index'])->name('taskPlain');
    Route::get('/taskLang', [TaskLangController::class, 'index'])->name('taskLang');
    Route::get('/taskMix', [TaskMixController::class, 'index'])->name('taskMix');
    Route::get('/about', [AboutController::class, 'index'])->name('about');
});
