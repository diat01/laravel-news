<?php

use App\Http\Api\Controllers\NewsController;
use Illuminate\Support\Facades\Route;


Route::get("news", [NewsController::class, "index"]);
