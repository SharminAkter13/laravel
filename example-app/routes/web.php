<?php

use App\Http\Controllers\OneToOneController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/master', function () {
    return view('master');
});

Route::get('/greeting', function () {
    return view('greeting', ['name' => 'Sharmin Akter']);
});

Route::get('/add-user', function () {
    return view('pages.user');
});


Route::get('/man-user', function () {
    return view('pages.manage_user');
});

Route::get('/', function () {
    return view('home');
});

// 📄 Profile routes
Route::get('/profiles', [ProfileController::class, 'index'])->name('profiles.index');         
Route::get('/profiles/create', [ProfileController::class, 'create'])->name('profiles.create'); 
Route::post('/profiles', [ProfileController::class, 'store'])->name('profiles.store');         

Route::get('/profiles/{profile}', [ProfileController::class, 'show'])->name('profiles.show');  
Route::get('/profiles/{profile}/edit', [ProfileController::class, 'edit'])->name('profiles.edit'); 
Route::put('/profiles/{profile}', [ProfileController::class, 'update'])->name('profiles.update');  
Route::delete('/profiles/{profile}', [ProfileController::class, 'destroy'])->name('profiles.destroy'); 
Route::get('/one-to-one', [OneToOneController::class, 'index']);


// User routes
Route::get('/user', [UserController::class, 'index']);
Route::get('/userCreate', [UserController::class, 'create'])->name('userCreate');
Route::post('/userStore', [UserController::class, 'store'])->name('userStore');

Route::get('/userEdit/{user_id}', [UserController::class, 'update'])->name('userEdit');
Route::post('/editStoreU', [UserController::class, 'editStore'])->name('editStoreU'); // Fixed method name

Route::delete('/delete', [UserController::class, 'destroy'])->name('delete');



Route::get('/post', [OneToManyController::class, 'index']);