<?php

use Illuminate\Support\Facades\Route;

Route::get('/domain/{name}', [\App\Http\Controllers\DomainController::class, "index"]);
