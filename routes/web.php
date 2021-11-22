<?php

use App\Http\Controllers\AuthController;
use App\Mail\VerificationCode;
use App\Models\Professionals;
use App\Models\User;
use App\Services\CreateProfessionals;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('site');

/**AUTENTICATION**/

Route::get('/login', [AuthController::class, 'login'])->name('auth.login');
Route::post('/authenticate', [AuthController::class, 'authenticate'])->name('auth.authenticate');
Route::post('/verification', [AuthController::class, 'verification'])->name('auth.verification');

Route::get('/logout', function () {
    Auth::logout();
    echo("saiu com sucesso");
})->name('auth.logout');

Route::name('admin.')->prefix('admin')->middleware('auth')->group(function () {
    Route::get('/', function () {
        return "Bem vindo - Dashboard";
    })->name('dashboard');
});
