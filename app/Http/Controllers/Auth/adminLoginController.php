<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Auth;
use App\Http\Controllers\Controller;

class adminLoginController extends Controller
{
    protected $redirectTo = '/Admin/home';

    public function __construct()
    {
      $this->middleware('guest:admins');
    }

    public function showLoginForm()
    {
      return view('auth.adminLogin');
    }

    public function login(Request $request)
    {
      $this->validate($request, [
        'email'   => 'required|email',
        'password' => 'required|min:8'
      ]);

      if (Auth::guard('admins')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
        return redirect()->intended(route('admin'));
      }

    
      return redirect()->back()->withInput($request->only('email', 'remember'));
    }
}
