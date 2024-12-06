<?php

use Illuminate\Support\Facades\Route;

Route::get('/test/{name}', [\App\Http\Controllers\DomainController::class, "index"]);
