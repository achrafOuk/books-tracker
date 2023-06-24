<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BookCommentController;
use App\Http\Controllers\BookStatusController;


Route::get('/',[BookController::class,'index'])->name('index');
Route::get('search',[BookController::class,'search'])->name('search-books');

Route::group(['prefix'=>'books'],function(){
    Route::get('/{slug}', [BookController::class, 'show'])->name('book-show');
});

Route::group(['middleware'=>'role:user'],function(){
    Route::group(['prefix'=>'comment'],function(){
        Route::post('/{slug}/add', [BookCommentController::class, 'store'])->name('store-book-comment');
        Route::post('/{slug}/update', [BookCommentController::class, 'update'])->name('update-book-comment');
        Route::post('/{slug}/delete', [BookCommentController::class, 'delete'])->name('delete-book-comment');
    });

    Route::group(['prefix'=>'status'],function(){
        Route::post('/{slug}/add', [BookStatusController::class, 'store'])->name('store-book-status');
        Route::post('/{slug}/delete', [BookStatusController::class, 'delete'])->name('delete-book-status');
    });
});

Route::group(['prefix'=>'dashboard','middleware'=>'role:admin'],function(){
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::group(['prefix'=>'books'],function(){
        Route::get('add', [BookController::class, 'create'])->name('create-book');
        Route::post('add', [BookController::class, 'store'])->name('store-book');
        Route::get('/{slug}/edit', [BookController::class, 'edit'])->name('edit-book');
        Route::post('/{slug}/edit', [BookController::class, 'update'])->name('update-book');
        Route::post('/{slug}/delete', [BookController::class, 'delete'])->name('delete-book');
        Route::get('search',[DashboardController::class,'search'])->name('search-books-dashboard');
    });
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
