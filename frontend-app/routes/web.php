<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;

Route::get('/',[CategoryController::class,'index'])->name('home.index');
Route::get('/category/create',[CategoryController::class,'create'])->name('category.create');
Route::post('/category', [CategoryController::class, 'store'])->name('category.store');
Route::delete('/category/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');
Route::get('/category/{id}/edit', [CategoryController::class, 'edit'])->name('category.edit');