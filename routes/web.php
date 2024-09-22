<?php

use App\Http\Controllers\IndexController;
use App\Http\Controllers\SendEmailController;
use Illuminate\Support\Facades\Route;

/*
Route::get('/', function(){
    return view('index');
});

*/

Route::get('/', [IndexController::class, 'index']);
//

Route::middleware(['spamguard:2,5'])->group(function(){
    Route::post('/send', [SendEmailController::class, 'send'])->name('message.send');
});
