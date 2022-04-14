<?php

use App\Http\Controllers\DataPasienController;
use App\Http\Controllers\DataRumahSakitController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

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
    return view('login');
})->middleware('guest');
Route::post('logout',[LoginController::class,'logout']);
Route::post('/login',[LoginController::class,'authenticate']);

Route::post('/dashboard/edit',[DataRumahSakitController::class,'edit'])->middleware('auth');
Route::post('/dashboard/show',[DataRumahSakitController::class,'show'])->middleware('auth');
Route::resource('/dashboard',(DataRumahSakitController::class))->middleware('auth');
Route::post('/dashboard/{id}',[DataRumahSakitController::class,'destroy'])->middleware('auth');

Route::post('/datapasien/edit',[DataPasienController::class,'edit'])->middleware('auth');
Route::post('/datapasien/show',[DataPasienController::class,'show'])->middleware('auth');
Route::resource('/datapasien',(DataPasienController::class))->middleware('auth');
Route::post('/datapasien/{id}',[DataRumahSakitController::class,'destroy'])->middleware('auth');

Route::get('/getCourse/{id}', function ($id) {
    $course = App\Models\Course::where('category_id',$id)->get();
    return response()->json($course);
});

