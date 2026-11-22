<?php

use App\Http\Controllers\MenuItemController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn () => redirect()->route('menu-items.index'));

// Creates: index, create, store, edit, update, destroy
Route::resource('menu-items', MenuItemController::class)->except(['show']);
