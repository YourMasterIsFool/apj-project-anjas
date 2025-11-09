<?php

use Illuminate\Support\Facades\Route;
use Modules\Lalin\Http\Controllers\ApjController;
use Modules\Lalin\Http\Controllers\JalanController;
use Modules\Lalin\Http\Controllers\LalinController;
use Modules\Lalin\Http\Controllers\TrafficController;
use Modules\Lalin\Http\Controllers\WarningController;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('lalins', LalinController::class)->names('lalin');
});




Route::prefix("lalin")->group(function () {
    Route::resource("jalan", JalanController::class);
    Route::resource("apj", ApjController::class);
    Route::resource("traffic", TrafficController::class);
    Route::resource("warning", WarningController::class);
});

Route::get("/jalan/export", [JalanController::class, "export"]);


Route::prefix("export-excel")->group(function () {
    Route::get("/jalan", [JalanController::class, "export"]);
    Route::get("/traffic", [TrafficController::class, "export"]);
    Route::get("/warning", [WarningController::class, "export"]);
});
