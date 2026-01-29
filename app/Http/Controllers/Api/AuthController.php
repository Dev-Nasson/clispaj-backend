<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use DB;

class AuthController extends Controller{
    
    public function __construct(){
        $this->middleware('auth:api', ['except' => ['login','register','refresh','logout']]);
    }

    public function register(Request $request){

        $user = User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'email_verified_at'=>now(),
            'password'=> Hash::make($request->password),
            'role'=>'Employee',
            'aniversario'=>$request->aniversario,
            'genero'=>$request->genero,
            'paisID'=>$request->paisID,
            'receiveNewsLatters'=>$request->receiveNewsLatters,
        ]);

        $token = Auth::guard('api')->login($user);
        return response()->json([
            'status' => 'success',
            'message' => 'User created successfully',
            'user' => $user,
            'authorisation' => [
                'access_token' => $token,
                'type' => 'bearer',
            ]
        ]);

    }

    public function login(Request $request){

            //     $validator = Validator::make($request->all(), [
            //         'email' => 'required|string|email',
            //         'password' => 'required|string',
            //     ],
            //   );

                // if ($validator->fails()) {
                //     return response()->json([
                //         'status' => 'error',
                //         'message' => 'Erro de validação',
                //         'errors' => $validator->errors(),
                //     ], 422);
                // }


        $credentials = $request->only('email', 'password');

        $token = Auth::guard('api')->attempt($credentials);
        if (!$token) {
            return response()->json([
                'status' => 'error',
                'message' => 'Unauthorized',
            ], 401);
        }

        $user = Auth::guard('api')->user();
        return response()->json([
                'status' => 'success',
                'user' => $user,

                'authorisation' => [
                    'token' => $token,
                    'type' => 'bearer',
                ]
            ]);

    }

    public function logout(){

        // Auth::guard('api')->logout();
        return response()->json([
            'status' => 'success',
            'message' => 'Successfully logged out',
        ]);
    }

    public function refresh(){

        return response()->json([
            'status' => 'success',
            'user' => Auth::guard('api')->user(),
            'authorisation' => [
                'token' => Auth::guard('api')->refresh(),
                'type' => 'bearer',
            ]
        ]);
    }

    protected function respondWithToken($token){

        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60,
            'user' => auth()->user()
        ]);
    }

}
