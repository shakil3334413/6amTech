<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        return view("auth.login");
    }

    public function login(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                "name" => "required",
                "password" => "required"
            ],["name.required"=>"Username or Email or Phone required"]);
            if ($validator->fails()) {
                return response()->json(["error" => $validator->errors()]);
            } else {
                if (Auth::attempt($this->username($request->name, $request->password))){
                    return response()->json("Login success");
                } else {
                    return response()->json(["errors"=>"UnAuthenticate User"]);
                }
            }
        } catch (\Throwable $e) {
            return response()->json("something went wrong");
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect("/");
    }

    public function username($name, $pass)
    {
        if (is_numeric($name)) {
            return ['phone' => $name, 'password' => $pass];
        } elseif (filter_var($name, FILTER_VALIDATE_EMAIL)) {
            return ['email' => $name, 'password' => $pass];
        }
        return ['username' => $name, 'password' => $pass];
    }
}
