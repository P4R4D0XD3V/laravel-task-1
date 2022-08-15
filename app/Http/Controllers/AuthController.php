<?php

namespace App\Http\Controllers;

use http\Client\Curl\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    protected $redirectPath = '/home';
    protected $loginPath = '/';

    public function login()
    {
        //validate
        $attrubites = request()->validate([
            'email' => 'required|email',
            'password'=> 'required'
        ]);
        if (auth()->attempt($attrubites)){
            return redirect('/home')->with('success','You successfully login');
        }
        return redirect()->back()->with('error' , 'Email or password is wrong');

    }

    public function logout()
    {
        auth()->logout();
        return redirect('/')->with('success' , 'You successfully logout');
    }
}
