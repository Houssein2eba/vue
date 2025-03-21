<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    $posts=App\Models\Post::get();
    return Inertia::render('Index',[
        'posts'=>$posts
    ]);
})->name('index');
Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');

Route::get('/create',[App\Http\Controllers\PostController::class,'create'])->name('post.create');
Route::post('/store',[App\Http\Controllers\PostController::class,'store'])->name('post.store');
