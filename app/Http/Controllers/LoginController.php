<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
  public function getLogin()
  {
    return view('login1');
  }

  public function postLogin(Request $request)
  {

      // Validate the form data
    $this->validate($request, [
      'identity' => 'required|numeric|digits_between:1,10',
      'password' => 'required'
    ]);

    $identity = $request->identity;
    $password = $request->password;

    if (Auth::guard('admin')->attempt(['nip' => $identity, 'password' => $password])) {
      return redirect()->intended('/upt');
    } else if (Auth::guard('user')->attempt(['nim' => $identity, 'password' => $password])) {
      return redirect()->intended('/user');
    }

    // if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {
    //   return redirect()->intended('/upt');
    // } else if (Auth::guard('user')->attempt(['email' => $request->email, 'password' => $request->password])) {
    //   return redirect()->intended('/user');
    // }

    return redirect()->back()->withErr('Email atau password salah!');

  }

  public function logout()
  {
    if (Auth::guard('admin')->check()) {
      Auth::guard('admin')->logout();
    } elseif (Auth::guard('user')->check()) {
      Auth::guard('user')->logout();
    }
    return redirect('/');
  }
}
