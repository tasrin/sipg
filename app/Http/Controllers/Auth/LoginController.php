<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\User; 


class LoginController extends Controller
{
    use AuthenticatesUsers;

  
    protected $redirectTo = RouteServiceProvider::HOME;
   
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $msg = [
            'username.*'=>'Username tidak boleh kosong !',
            'password.*'=>'Password tidak boleh kosong !'
        ];
        $request->validate([
            'username'=>'required|string',
            'password'=>'required'
        ], $msg);

        $credentials = request(['username', 'password']);
        if(!Auth::attempt($credentials)){
            $message = [
                'username' => $request->username,
                'message'=> 'Login gagal, masukan username dan password yang valid.',
            ];
            return redirect()->back()->with($message);
        }

     
        $message = [
            'success'=> true,
            'alert-type' => 'success',
            'message' => 'Selamat datang '.ucwords(Auth::user()->name).' di Sistem Informasi Pendataan dan Gaji Karyawan'
        ];
        return redirect()->route('home')->with($message);
    }

    public function username()
    {
        return 'username';
    }
}
