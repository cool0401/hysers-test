<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\ContactPageController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/contacts', [ContactController::class, 'index']);
Route::post('/contacts', [ContactController::class, 'store']);
Route::put('/contacts/{id}', [ContactController::class, 'update'])->name('contacts.update');
Route::delete('/contacts/{id}', [ContactController::class, 'destroy'])->name('contacts.destroy');


Route::get('/contacts-ui', [ContactPageController::class, 'index'])->name('contacts.ui');
Route::get('/contacts-ui/{contact}/edit', [ContactPageController::class, 'edit'])->name('contacts.edit');
Route::delete('/contacts-ui/{contact}', [ContactPageController::class, 'destroy'])->name('contacts.ui.destroy');

