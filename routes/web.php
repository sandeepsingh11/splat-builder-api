<?php

use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/api/test', function () {
    return [
        'message'=> 'Hi from Laravel!'
    ];
});

Route::get('/api/token', function () { return [csrf_token()]; });

Route::post('/api/register', [RegisterController::class, 'register']);
