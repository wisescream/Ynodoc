<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/'; // Redirige vers /welcome après la connexion

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function showUserTypeForm()
    {
        return view('auth.user-type');
    }

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
