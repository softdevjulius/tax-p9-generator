<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        if ($request->isMethod("GET"))
            return view("auth.login");

        if (auth()->attempt([
            "email" => $request->email,
            "password" => $request->password,
        ])){
            return redirect()
                ->route("home")
                ->with([
                    "success" => 1,
                    "msg" => "Successfully logged in.",
                ]);
        }

        return back()->with([
            "success" => 0,
            "msg" => "Incorrect email or password",
        ]);
    }
}
