@extends('layouts.app')

@section('more-css')
<link href="{{asset('css/login.css')}}" rel="stylesheet">
<link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
@endsection

@section('content')
<main class="container-fluid d-flex flex-column align-items-center p-0" style="min-height: 100vh">
    <div class="container-login d-flex flex-column px-5" id="login">
        <div class="forms">
            <div class="form login">
                <span class="title mt-3">Login</span>

                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="input-field">
                        <input type="email" class="@error('email') is-invalid @enderror" placeholder="Enter your email"
                            required autocomplete="email" autofocus>

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>


                    <div class="input-field">
                        <input type="password" class="password  @error('password') is-invalid @enderror"
                            placeholder="Enter your password" required autocomplete="current-password">

                        <i class="uil uil-eye-slash showHidePw"></i>

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="checkbox-text">
                        <div class="checkbox-content">
                            <input type="checkbox" id="remember">
                            <label for="remember" class="text">Remember me</label>
                        </div>

                        @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                        @endif
                    </div>

                    <div class="input-field button">
                        <input type="submit" value="Login Now">
                    </div>
                </form>

                <div class="login-signup">
                    <span class="text">Not a member?
                        <a href="#" class="text signup-link">Signup now</a>
                    </span>
                </div>

                {{-- <div class="text-center my-4">
                    <div style="width: 100%;
                            text-align: center;
                            border-bottom: 1px solid rgb(210,210,210);
                            line-height: 0.1em;
                            margin: 10px 0 20px; ">
                        <span style="background:#fff; padding:0 10px;">or</span>
                    </div>
                </div>
                <div class="d-flex flex-column justify-content-center align-items-center mb-2">
                    <a href="{{route('login.google')}}" class="px-5 py-2 m-1 btn btn-outline-info rounded-0">
                        <i class="bx bxl-google me-1 fs-5 align-middle"></i> <span class="align-middle">Sign in with
                            Google</span>
                    </a>
                </div> --}}
            </div>


            <div class=" form signup ">
                <span class=" title">I am signing up as:</span>

                <div class="input-field button">
                    <a href="{{ url('/register/doctor')}}"><input type="button" value="Doctor"></a>
                </div>
                <div class="input-field button">
                    <a href="{{ url('/register')}}"><input type="button" value="Patient"></a>
                </div>
                <div class="login-signup">
                    <span class="text">Already a member?
                        <a href="" class="text login-link">Login now</a>
                    </span>
                </div>
                </form>
            </div>
            </form>
        </div>
    </div>
    @include('layouts.footer')
</main>

<script src="{{asset('js/navbar_v2.js')}}"></script>
<script src="{{asset('js/login.js')}}"></script>
@endsection
