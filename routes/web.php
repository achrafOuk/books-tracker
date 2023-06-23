<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BookCommentController;


Route::get('/',[BookController::class,'index'])->name('index');

Route::group(['prefix'=>'books'],function(){
    Route::get('/{slug}', [BookController::class, 'show'])->name('book-show');
});

Route::group(['role:user'],function(){
    Route::group(['prefix'=>'comment'],function(){
        Route::post('/{slug}/add', [BookCommentController::class, 'store'])->name('store-book-comment');
    });
});

Route::group(['prefix'=>'dashboard','role:admin'],function(){
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::group(['prefix'=>'books'],function(){
        Route::get('add', [BookController::class, 'create'])->name('create-book');
        Route::post('add', [BookController::class, 'store'])->name('store-book');
        Route::get('/{slug}/edit', [BookController::class, 'edit'])->name('edit-book');
        Route::post('/{slug}/edit', [BookController::class, 'update'])->name('update-book');
        Route::post('/{slug}/delete', [BookController::class, 'delete'])->name('delete-book');
    });
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
