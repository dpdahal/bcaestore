<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{

    public function index(Request $request)
    {
        if ($request->isMethod('get')) {
            $authData=Auth::guard('admin')->user();
            if ($authData) {
                return redirect()->route('dashboard');
            }
            return view('backend.login.index');
        }

        if ($request->isMethod('post')) {
            $this->validate($request, [
                'username' => 'required',
                'password' => 'required'
            ]);

            $username = $request->username;
            $password = $request->password;
            if (Auth::guard('admin')->attempt(['username' => $username, 'password' => $password])) {
                return redirect()->route('dashboard');
            } else {
                return redirect()->back()->with('error', 'Invalid Username or Password');
            }

        }

        return "Invalid Route Request";

    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin-login');
    }
}
