@extends('layouts.login')

@section('content')
<div class="mainDiv">
    <div class="form">
        <div class="flexbox logo"><img src="/images/logo.png" alt=""><span>AROMA</span></div>
        <div class="flexbox wel">Welcome Back</div>
        <div class="flexbox google">
            <i class="fa-brands fa-google"></i><span><h5>Log in with google</h5></span>
        </div>
        <div class="optn2">
            <h2 class="or">
                <span>or sign in with email</span>
            </h2>
        </div>
        <form method="POST" action="{{ route('lec.login.submit') }}">
            @csrf

            <div class="flexbox">
                <div>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="flexbox">

                <div>
                    <input id="password" placeholder="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="flexbox rem">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label for="remember">Keep me signed in</label>
                    </div>
                    <div>
                        @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                    </div>
            </div>

            <div class="flexbox button">              
                    <button type="submit">
                        {{ __('Login') }}
                    </button>
            </div>
        </form>
    </div>
    <div class="pic">
        <img src="/images/Teaching.png" alt="">
    </div>
</div>
@endsection

<!--
    
-->
