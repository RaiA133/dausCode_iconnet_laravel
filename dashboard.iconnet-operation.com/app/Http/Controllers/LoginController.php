<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use RealRashid\SweetAlert\Facades\Alert;

class LoginController extends Controller
{
  public function login()
  {
      if (auth()->check()) {
          return redirect('/dashboard');
      }
  $title = "login";
      return view('auth.login', compact('title'));
  }
  public function authenticate(Request $request)
  {
      $credentials = $request->only('email', 'password');

      if (Auth::attempt($credentials)) {
          // Authentication passed...
          Alert::success('Selamat Datang!!!', 'Anda Berhasil Masuk');
          return redirect()->intended('/dashboard');
      } else {
          // Authentication failed...
          $user = User::where('email', $credentials['email'])->first();

          if (!$user) {
              Alert::error('Mohon Maaf!!!', 'Email atau Password Salah!!!');
              return redirect()->back();
          } else {
            Alert::error('Mohon Maaf!!!', 'Email atau Password Salah!!!');
              return redirect()->back();
          }
      }
      // return $request;
  }


      /**
     * Summary of logout
     * @param Request $request
     * @return RedirectResponse
     */

  public function logout(Request $request): RedirectResponse
  {
      Auth::logout();
      $request->session()->invalidate();
      $request->session()->regenerateToken();
      return redirect ('/login');
  }
}
