<?php

use App\Mail\VerificationCode;
use App\Models\User;
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

Route::get('/login', function () {
    return view('auth.login', ['title'=>'Login']);
})->name('auth.login');

Route::post('/validate', function (Request $req) {
    if (!isset($req->email)) {
        throw new Exception("é necessário um email");
    }

    // $user = User::where('email', $req->email)->first();

    // if (! $user) {
    //     $user = User::create(['email'=>$req->email]);
    // }

    // $code = mt_rand(1000, 9999);

    // $user->verification_code = $code;
    // $user->save();

    // Mail::to($req->email)->send(new VerificationCode($code));

    return view('auth.verification', ['title'=>'Validate', 'email'=>$req->email]);
})->name('auth.validate');

Route::post('/verification', function (Request $req) {
    if (!isset($req->code)) {
        return response()->json(["error"=> true, "message"=> "Digite seu código de quatro dígitos"]);
    }

    $user = User::where('email', $req->email)->first();

    if ($user->verification_code == $req->code) {
        Auth::login($user);

        return response()->json(["error"=> false,]);
    }


    return response()->json(["error"=> true,"message"=> "Código inválido"]);
})->name('auth.verification');

Route::get('/logout', function () {
    Auth::logout();
    echo("saiu com sucesso");
})->name('auth.logout');

Route::name('admin.')->prefix('admin')->middleware('auth')->group(function () {
    Route::get('/', function () {
        return "Bem vindo - Dashboard";
    })->name('dashboard');
});
