<?php

use Azuriom\Plugin\Zchangelog\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your plugin. These
| routes are loaded by the RouteServiceProvider of your plugin within
| a group which contains the "web" middleware group and your plugin name
| as prefix. Now create something great!
|
*/

Route::get('/', [AdminController::class, 'index'])->name('index');
Route::get('/create', [AdminController::class, 'create'])->name('create');
Route::post('/store', [AdminController::class, 'store'])->name('store');
Route::get('/edit/{changeLog}', [AdminController::class, 'edit'])->name('edit');
Route::get('/destroy/{changeLog}', [AdminController::class, 'destroy'])->name('destroy');
Route::post('/edit/{changeLog}/update', [AdminController::class, 'update'])->name('update');
