<?php

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
