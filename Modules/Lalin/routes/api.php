<?php

use Illuminate\Support\Facades\Route;
use Modules\Lalin\Http\Controllers\LalinController;

Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {
    Route::apiResource('lalins', LalinController::class)->names('lalin');
});
