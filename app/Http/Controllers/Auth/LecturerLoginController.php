<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Auth;
use App\Http\Controllers\Controller;

class LecturerLoginController extends Controller
{
    public function __construct()
    {
      $this->middleware('guest:lecturer');
    }

    public function showLoginForm()
    {
      return view('auth.leclogin');
    }

    public function login(Request $request)
    {
      $this->validate($request, [
        'email'   => 'required|email',
        'password' => 'required|min:8'
      ]);

      if (Auth::guard('lecturer')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
        return redirect()->intended(route('lec.show'));
      }

    
      return redirect()->back()->withInput($request->only('email', 'remember'));
    }
}
