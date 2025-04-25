<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

use App\Http\Controllers\PlantController;

Route::get('/', [PlantController::class, 'index']);
Route::post('/identify', [PlantController::class, 'identify']);


use App\Http\Controllers\MyPlantController;

Route::get('/myplants', [MyPlantController::class, 'index'])->name('myplants.index');
Route::post('/plants/save', [PlantController::class, 'save'])->name('plants.save');

Route::delete('/plants/{id}', [PlantController::class, 'destroy']);


