<?php

use App\Http\Controllers\InnController;
use Illuminate\Support\Facades\Route;

Route::get('/', [InnController::class, 'index']);
Route::post('/', [InnController::class, 'store']);
