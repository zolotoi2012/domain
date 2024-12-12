<?php

use Illuminate\Support\Facades\Route;

Route::get('/search/{entityType}', [\App\Http\Controllers\SearchController::class, "search"]);
