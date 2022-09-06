<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Http\Requests\LoginRequest;

class AuthController extends Controller
{
    /**
     * Create a new controller instance
     * 
     * @return void
     */
    public function __construct() {
        //
    }

    /**
     * Authenticate a user and return token
     *
     * @param  App\Http\Requests\LoginRequest $request
     * @return \Illuminate\Http\Response
     */
    public function login(LoginRequest $request)
    {
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){ 
            $user = Auth::user(); 
            $success['token'] =  $user->createToken('LaravelAuthApp')->accessToken; 
            $success['name'] =  $user->name;
   
            $response = [
                'success' => true,
                'data'    => $success,
                'message' => 'User login successfully.'
            ];

            return response()->json($response, 200);
        }

        $response = [
            'success' => false,
            'message' => 'Unauthorised.'
        ];

        return response()->json($response, 401);
    }
}
