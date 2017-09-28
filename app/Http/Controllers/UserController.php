<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function store(Request $request)
    {

        User::create([
            'senha'     => \bcrypt($request->senha),
            'nome'      => $request->nome,
            'email'     => $request->email,
        ]);
        return response()->json(['sucesso' => true]);
    }

    public function verify(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        if($user) {
            if(password_verify($request->senha, $user->senha)) {
                return response()->json([
                    'sucesso' => true,
                    'user' => [
                        'id' => $user->id,
                        'nome' => $user->nome,
                        'email' => $user->email,
                    ]
                ]);
            }
        }

        return response()->json(['sucesso' => false]);
    }
}
