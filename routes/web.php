<?php

use App\Models\Material;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\MaterialDetailController;
use App\Http\Controllers\QuizGeneralController;
use App\Http\Controllers\QuizSpecialController;
use App\Http\Controllers\StudentAnswerController;

Route::get('/', function () {
    return view('welcome');
})->middleware('isTamu');

Route::get('/login', [SessionController::class, 'index'])->middleware('isTamu');
Route::post('/login', [SessionController::class, 'login'])->middleware('isTamu');
Route::get('/logout', [SessionController::class, 'logout']);
Route::get('/register', [SessionController::class, 'register'])->middleware('isTamu');
Route::post('/create', [SessionController::class, 'create'])->middleware('isTamu');

Route::get('/material_detail/{id}', [MaterialDetailController::class, 'create'])->middleware('isLogin');
Route::post('/material_detail', [MaterialDetailController::class, 'store'])->middleware('isLogin');
Route::get('/material_detail/edit/{id}', [MaterialDetailController::class, 'edit'])->middleware('isLogin');
Route::put('/material_detail/{id}', [MaterialDetailController::class, 'update'])->middleware('isLogin');
Route::delete('/material_detail/{id}', [MaterialDetailController::class, 'delete'])->middleware('isLogin');

Route::resource('material', MaterialController::class)->middleware('isLogin');
Route::get('/material_delete', function () {
    return view('material/delete')->with('data', Material::orderBy('bab', 'asc')->get());
})->middleware('isLogin');

// admin special
Route::get('/quiz_special/{material_id}/{id}', [QuizSpecialController::class, 'show'])->middleware('isLogin');
Route::post('/quiz_special', [QuizSpecialController::class, 'store'])->middleware('isLogin');
Route::delete('/quiz_special/{material_id}/{id}', [QuizSpecialController::class, 'delete'])->middleware('isLogin');

// user special
Route::get('/quiz_special_user/{material_id}', [QuizSpecialController::class, 'showUser'])->middleware('isLogin');
Route::post('/quiz_special_user', [QuizSpecialController::class, 'storeUser'])->middleware('isLogin');
Route::get('/result_quiz_special/{material_id}', [StudentAnswerController::class, 'index'])->middleware('isLogin');

// admin general
Route::get('/quiz_general/{material_id}', [QuizGeneralController::class, 'index'])->middleware('isLogin');
Route::post('/quiz_general/{material_id}', [QuizGeneralController::class, 'store'])->middleware('isLogin');
Route::delete('/quiz_general/{material_id}/{id}', [QuizGeneralController::class, 'delete'])->middleware('isLogin');

Route::get('/quiz_general/{material_id}/{qg_id}/{id}', [QuizGeneralController::class, 'show'])->middleware('isLogin');
Route::post('/quiz_general_detail', [QuizGeneralController::class, 'store_detail'])->middleware('isLogin');
Route::delete('/quiz_general_detail/{dataM}/{qg_id}/{id}', [QuizGeneralController::class, 'delete_detail'])->middleware('isLogin');

// user general
Route::get('/quiz_general_user/{material_id}/{qg_id}/{id}', [QuizGeneralController::class, 'showUser'])->middleware('isLogin');
Route::post('/quiz_general_user_detail', [QuizGeneralController::class, 'store_detailUser'])->middleware('isLogin');
Route::get('/result_quiz_general/{material_id}/{qg_id}', [StudentAnswerController::class, 'index_gen'])->middleware('isLogin');
