@extends('layouts.auth')

@section('title')
    Login
@endsection

@section('content')
    <div class="vh-100">
        <div class="row  h-100 ">
            <div class="col-lg-6 my-auto px-5">
                <div class="p-5">
                    <div>
                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>

                        <form class="user">
                            <div class="form-group">
                                <input type="email" class="form-control form-control-user custom-border"
                                    id="exampleInputEmail" aria-describedby="emailHelp"
                                    placeholder="Enter Email Address...">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control form-control-user custom-border"
                                    id="exampleInputPassword" placeholder="Password">
                            </div>
                            <div class="form-group">
                                <div class="custom-control custom-checkbox small">
                                    <input type="checkbox" class="custom-control-input" id="customCheck">
                                    <label class="custom-control-label" for="customCheck">Remember
                                        Me</label>
                                </div>
                            </div>
                            <div class="p-5">
                                <a href="/" class="btn btn-primary btn-block custom-border">
                                    Login
                                </a>
                            </div>
                            {{-- <a href="index.html" class="btn btn-primary btn-block ">
                            Login
                        </a> --}}
                            <hr>
                            {{-- <a href="index.html" class="btn btn-google btn-user btn-block">
                            <i class="fab fa-google fa-fw"></i> Login with Google
                        </a>
                        <a href="index.html" class="btn btn-facebook btn-user btn-block">
                            <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                        </a> --}}
                        </form>
                        <hr>
                        <div class="text-center">
                            <a class="small" href="forgot-password.html">Forgot Password?</a>
                        </div>
                        <div class="text-center">
                            <a class="small" href="register.html">Create an Account!</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
        </div>
    </div>
@endsection
