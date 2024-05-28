<?php

use App\Http\Controllers\EventController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});




Route::get("/universities/{city}", [EventController::class, "getUniversitiesByCity"])->name("getUniversitiesByCity");






Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/index',[EventController::class,'index'])->name('panel.event.index');
    Route::get('/create',[EventController::class,'create'])->name('panel.event.create');
    Route::post('/store',[EventController::class,'store'])->name('panel.event.store');
    Route::get('/destroy/{id}',[EventController::class,'destroy'])->name('panel.event.destroy');
    Route::get('/show/index/{id}', [EventController::class, 'show'])->name("panel.event.show");

    Route::get('/MyEvents',[EventController::class,'MyEvents'])->name('panel.event.MyEvents');



    Route::get("/edit/{id}", [EventController::class, "edit"])->name("panel.event.edit");
    Route::post("/update", [EventController::class, "update"])->name("panel.event.update");
});
