<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HookController;

Route::get('/', function () {
    return view('welcome');
});

// admin section
require __DIR__ . '/admin.php';


// set hook
Route::get('set/hook', [HookController::class, 'setHook']);

// delete hook
Route::get('delete/hook', [HookController::class, 'deleteHook']);

// url for getting response from telegram
Route::post('hook-x628798uaysr', [HookController::class, 'hook']);


