<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//Route::middleware(['auth', 'admin'])->group(function () {
//    Route::get('/alunos', 'AlunoController@index')->name('alunos.index');
//    Route::get('/alunos/create', 'AlunoController@create')->name('alunos.create');
//    Route::post('/alunos', 'AlunoController@store')->name('alunos.store');
//    Route::get('/alunos/{aluno}', 'AlunoController@show')->name('alunos.show');
//    Route::get('/alunos/{aluno}/edit', 'AlunoController@edit')->name('alunos.edit');
//    Route::put('/alunos/{aluno}', 'AlunoController@update')->name('alunos.update');
//    Route::delete('/alunos/{aluno}', 'AlunoController@destroy')->name('alunos.destroy');
//});

require __DIR__.'/auth.php';

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
