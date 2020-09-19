<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function show()
    {
      return view('pages/login');
    }

    public function login(Request $request)
    {
      $data = $request->input();
      $user = $data['username'];
      $request->session()->put('username', $user);

      $username = session('username');

      return view('pages/profile', compact('user', 'data'));
    }

    public function logout(Request $request)
    {
      if(session()->has('username')) {
        session()->pull('username');
      }
      return view('pages/login');
    }
}
