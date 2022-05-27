<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterControllser extends Controller
{
        public function create(){
            return view('login_register.form-register',[
                'title' => 'form-register',
            ]);
        }
        public function store(Request $request){
        $validateData = $this->validate($request,[
         'name' => 'required|min:8|max:20|unique:users',
         'username' => 'required|min:8|max:20|unique:users',
         'email' => 'required|email:dns',
         'password' => 'required|min:8',
        ]);

        $validateData['password']= bcrypt($validateData['password']);
        User::create($validateData);
        return redirect('/form-login')->with('success', 'Registration successfull! Please login');
     }
}
