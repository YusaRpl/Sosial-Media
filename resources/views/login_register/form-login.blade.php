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
                        <a href="/form-login" class="py-3 px-4">Login</a>
                        <a href="/form-register" class="bg-pink-500 pink-500 px-6 py-3 rounded-md shadow text-white">Register</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Content-->
        <div>
            <div class="lg:p-12 max-w-md max-w-xl lg:my-0 my-12 mx-auto p-6 space-y-">
                <h1 class="lg:text-3xl text-xl font-semibold  mb-3"> Log in</h1>
                
                @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show mb-5" role="alert">
                {{session('success')}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
        
                @if (session()->has('loginError'))
                        <div class="alert alert-danger alert-dismissible fade show mb-5" role="alert">
                {{session('loginError')}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif

                <p class="mb-2 text-black text-lg"> Email or Username</p>
                <form action="form-login" method="POST">
                    @csrf
                    <input type="email" name="email" placeholder="example@mydomain.com" class="bg-gray-200 mb-2 shadow-none dark:bg-gray-800  @error('email') is-invalid @enderror" style="border: 1px solid #d3d5d8 !important;">
                    @error('email')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                    <input type="password" name="password" placeholder="***********" class="bg-gray-200 mb-2 shadow-none dark:bg-gray-800  @error('password') is-invalid @enderror" style="border: 1px solid #d3d5d8 !important;">
                    @error('password')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                    <button type="submit" class="bg-gradient-to-br from-pink-500 py-3 rounded-md text-white text-xl to-red-400 w-full">Login</button>
                    <div class="text-center mt-5 space-x-2">
                    <p class="text-base"> Not registered? <a href="/form-register" class=""> Create a account </a></p>
                    </div>
                </form>
            </div>
        </div>
        
        <!-- Footer -->

        <div class="lg:mb-5 py-3 uk-link-reset" style="margin-top: 110px">
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
