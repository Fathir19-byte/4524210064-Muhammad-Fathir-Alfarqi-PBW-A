<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/tentang-kami', function () {
    return view('about'); // Kita akan menampilkan view bernama 'about'
});

Route::get('/kontak-kami', function () {
    return view('kontak'); // Kita akan menampilkan view bernama 'Kontak'
});
