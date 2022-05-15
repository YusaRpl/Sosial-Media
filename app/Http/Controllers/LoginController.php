<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(){
        return view('login_register.form-login',[
            'title' => 'form-login',
        ]);
    }
    
    public function authenticate(Request $request){
     $credentials = $this->validate($request,[
         'email' => 'required|email',
         'password' => 'required|min:8'
        ]);
        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            $username = auth()->user()->username;
            return redirect()->intended('/trending');
        }
        return back()->with('loginError', 'Login Failed!');
    }
 
    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/form-login');
 
    }
 }
