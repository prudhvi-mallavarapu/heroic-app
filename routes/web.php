<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.breached-monitoring');
})->name('home');
