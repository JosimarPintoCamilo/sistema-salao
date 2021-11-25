<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\CreateUser;
use App\Services\Update\UpdateCodeVerificationUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login', ['title'=>'Login']);
    }

    public function authenticate(Request $req)
    {
        if (!isset($req->email)) {
            throw new \Exception("é necessário um email");
        }
    
        $user = (new CreateUser)->withEmail($req->email);
    
        (new UpdateCodeVerificationUser)->update($user['id']);

        // Mail::to($req->email)->send(new VerificationCode($code));
    
        return view('auth.verification', ['title'=>'Validate', 'email'=>$req->email]);
    }

    public function verification(Request $req)
    {
        if (!isset($req->code)) {
            return response()->json(["error"=> true, "message"=> "Digite seu código de quatro dígitos"]);
        }
    
        $user = User::where('email', $req->email)->first();
    
        if ($user->verification_code == $req->code) {
            Auth::login($user);
    
            return response()->json(["error"=> false,]);
        }
    
        return response()->json(["error"=> true,"message"=> "Código inválido"]);
    }
}
