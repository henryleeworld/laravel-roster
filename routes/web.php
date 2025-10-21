<?php

use App\Http\Controllers\RosterController;
use Illuminate\Support\Facades\Route;

Route::get('roster/', [RosterController::class, 'index']);
