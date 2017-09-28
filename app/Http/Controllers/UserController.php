<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function store(Request $request)
    {
        User::create([
            'password' => bcrypt($request->password),
            'name'     => $request->name,
            'email'    => $request->email,
        ]);
        return response()->json(['success' => true]);
    }

    public function verify(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        if($user) {
            if(password_verify($request->password, $user->password)) {
                return response()->json([
                    'success' => true,
                    'user' => [
                        'id' => $user->id,
                        'nome' => $user->name,
                        'email' => $user->email,
                    ]
                ]);
            }
        }

        return response()->json(['success' => false]);
    }
}
