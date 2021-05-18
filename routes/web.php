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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
Route::middleware(['auth:sanctum', 'verified'])->get('/article',\App\Http\Livewire\CrudArt::class )->name('article');
Route::middleware(['auth:sanctum', 'verified'])->get('/student',\App\Http\Livewire\Crud::class )->name('student');
Route::middleware(['auth:sanctum', 'verified'])->get('/fourn',\App\Http\Livewire\CrudFourn::class )->name('fourn');

//Route::get('students', function () {
  //  return view('welcome');
//});


