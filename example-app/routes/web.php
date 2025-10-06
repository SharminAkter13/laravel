<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('master');
});

Route::get('/greeting', function () {
    return view('greeting', ['name' => 'Sharmin Akter']);
});

Route::get('/user', function () {
    return view('pages.user');
});
