<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Requests\UserLoginRequest;
use App\Http\Controllers\Controller;
use Auth;
class AuthController extends Controller
{
    public function postLogin(UserLoginRequest $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password]))
        {
            return response([
                'status' => 'success'
            ]);
        }
        else
        {
            return response([
                'status' => 'error'
            ]);
        }
    }
    
}
