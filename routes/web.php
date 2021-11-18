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

/**AUTENTICATION**/

Route::get('/login', function () {

    return view('auth.login');
})->name('login');

Route::get('/logout', function () {

    Auth::logout();
    echo ("saiu com sucesso");
})->name('logout');

Route::get('/validate', function (Request $req) {

    if(!isset($req->email))
    {
        throw new Exception("é necessário um email");
    }

    $user = User::where('email',$req->email)->first();


    if (! $user)
    {
        $user = User::create(['email'=>$req->email]);
    }

    $code = mt_rand(1000, 9999);

    $user->verification_code = $code;
    $user->save();

    Mail::to($req->email)->send( new VerificationCode($code));

    return view('auth.verification', ['email'=>$req->email]);
})->name('validate');

Route::get('/verification', function (Request $req) {

    $user = User::where('email',$req->email)->first();

    if($user->verification_code == $req->code){
        echo "codigo correto";
        Auth::login($user);

        return redirect()->route('dashboard');

    }


    return "codigo ERRADO";
})->name('verification');


Route::get('/', function () {

    echo("Dashboard - área logada.");

})->name('dashboard')->middleware('auth');

Route::get('/welcome', function () {
    $user = User::find(1);

    Auth::login($user);

    return view('welcome');
})->name('welcome');
