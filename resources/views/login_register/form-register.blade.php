@extends('layout.login_register')
        @section('main_content')
        <!-- header-->
        <div class="bg-white py-4 shadow dark:bg-gray-800">
            <div class="max-w-6xl mx-auto">


                <div class="flex items-center lg:justify-between justify-around">

                    <a href="trending.html">
                        <img src="assets/images/logo.png" alt="" class="w-32">
                    </a>

                    <div class="capitalize flex font-semibold hidden lg:block my-2 space-x-3 text-center text-sm">
                        <a href="form-login.html" class="py-3 px-4">Login</a>
                        <a href="form-register.html" class="bg-pink-500 pink-500 px-6 py-3 rounded-md shadow text-white">Register</a>
                    </div>

                </div>
            </div>
        </div>

        <!-- Content-->

        <div>
            <div class="lg:p-12 max-w-md max-w-xl lg:my-0 my-12 mx-auto p-6 space-y-">
                <h1 class="lg:text-3xl text-xl font-semibold mb-6">Regsiter</h1>
                <p class="mb-2 text-black text-lg"> Register to manage your account </p>
                <form action="/form-register" method="post">
                    @csrf
                    <input type="text" name="name" placeholder="Name" class="bg-gray-200 mb-2 shadow-none  dark:bg-gray-800 @error('name') is-invalid @enderror" style="border: 1px solid #d3d5d8 !important;" value="{{old('name')}}">
                    @error('name')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                    <input type="text" name="username" placeholder="Username" class="bg-gray-200 mb-2 shadow-none  dark:bg-gray-800 @error('name') is-invalid @enderror" style="border: 1px solid #d3d5d8 !important;" value="{{old('name')}}">
                    @error('username')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                    <input type="email" name="email" placeholder="Email" class="bg-gray-200 mb-2 shadow-none  dark:bg-gray-800 @error('email') is-invalid @enderror" style="border: 1px solid #d3d5d8 !important;" value="{{old('email')}}">
                    @error('email')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                    <input type="password" name="password" placeholder="Password" class="bg-gray-200 mb-2 shadow-none  dark:bg-gray-800 @error('password') is-invalid @enderror" style="border: 1px solid #d3d5d8 !important;">
                    @error('password')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                    <button type="submit" class="bg-gradient-to-br from-pink-500 py-3 rounded-md text-white text-xl to-red-400 w-full">Sign in</button>
                    <div class="text-center mt-5 space-x-2">
                        <p class="text-base"> Do you have an account? <a href="/form-login"> Login </a></p>
                    </div>
                </form>
            </div>
        </div>
        
        <!-- Footer -->

        <div class="lg:mb-5 py-3 uk-link-reset">
            <div class="flex flex-col items-center justify-between lg:flex-row max-w-6xl mx-auto lg:space-y-0 space-y-3">
                <div class="flex space-x-2 text-gray-700 uppercase">
                    <a href="#"> About</a>
                    <a href="#"> Help</a>
                    <a href="#"> Terms</a>
                    <a href="#"> Privacy</a>
                </div>
                <p class="capitalize"> © copyright 2020 by Instello</p>
            </div>
        </div>
        @endsection
