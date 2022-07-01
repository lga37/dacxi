<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('home');
})->name('home');


Route::get('/exchange', [App\Http\Controllers\ExchangeController::class, 'index'])->name('exchange');
Route::get('/category', [App\Http\Controllers\CategoryController::class, 'index'])->name('category');
Route::get('/coin', [App\Http\Controllers\CoinController::class, 'index'])->name('coin');
Route::get('/derivative', [App\Http\Controllers\DerivativeController::class, 'index'])->name('derivative');
Route::get('/history', [App\Http\Controllers\HistoryController::class, 'index'])->name('history');
Route::get('/index', [App\Http\Controllers\IndexController::class, 'index'])->name('index');
Route::get('/platform', [App\Http\Controllers\PlatformController::class, 'index'])->name('platform');






Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
