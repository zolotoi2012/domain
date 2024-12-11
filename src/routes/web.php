<?php

use Illuminate\Support\Facades\Route;

Route::get('/domain', [\App\Http\Controllers\DomainController::class, "index"]);
