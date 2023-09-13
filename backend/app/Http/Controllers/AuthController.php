<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{   
    protected $user;
    
    public function __construct(User $user) {
        $this->user = $user;
    }

    public function Authenticate(Request $request) {
        $validateReq = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        if ($validateReq) {
            $email = $request->email;
            $password = $request->password;
            if(Auth::attempt(["email" => $email, "password" => $password])) {
                $generateToken = $this->user::where("email", $email)->first()->createToken("token-auth")->plainTextToken;
                return response()->json([
                    "status" => "success",
                    "message" => "login success",
                    "data" => [
                        "token" => $generateToken
                    ],
                ]);
            }
            return response()->json(
                [
                    "status" => "failed",
                    "message" => "Email or Password doesn't correct",
                    "data" => [],
                ]
            );
        }
        return response()->json(
            [
                "status" => "failed",
                "message" => $validateReq,
                "data" => [],
            ]
        );
        
    }

    public function Save(Request $request) {
        $validateReq = $request->validate([
            "name" => "required",
            "email" => "required|email",
            "password" => "required",
            // "role_id" => "required"
        ]);

        if($validateReq) {
            $message = "";
            $data = [];
            if($request->id) {
                // update existing
                $user = User::where("id", $request->id)->update([
                    "name" => $request->name,
                    "email" => $request->email,
                    "password" => Hash::make($request->password),
                    // "role_id" => $request->role_id
                ]);
                $message = "User updated";
                $data = $user;
            }else {
                // create new user
                $user = User::create([
                    "name" => $request->name,
                    "email" => $request->email,
                    "password" => Hash::make($request->password),
                    // "role_id" => $request->role_id
                ]);
                $message = "User created";
                $data = $user;
            }
            if($user) {
                return response()->json([
                    "status" => "success",
                    "message" => $message,
                    "data" => $data,
                ]);
            }
            return response()->json([
                "status" => "failed",
                "message" => "Internal Server Error",
                "data" => [],
            ]);
        }
        return response()->json(
            [
                "status" => "failed",
                "message" => $validateReq,
                "data" => [],
            ]
        );
    }

    public function Logout(Request $request) {
        $deleteToken = $request->user()->currentAccessToken()->delete();
        if ($deleteToken) {
            return response()->json(
                [
                    "status" => "success",
                    "message" => "success logout",
                    "data" => [
                        "token" => $deleteToken,
                    ],
                ]
            );
        }
        return response()->json(
            [
                "status" => "failed",
                "message" => "error logout",
                "data" => [],
            ]
        );
    }
}
