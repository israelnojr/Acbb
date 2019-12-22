@extends('layouts.backend.app')

@section('content')

<body class="bg-dark">

    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <div class="login-logo">
                    <a href="{{('/')}}">
                        <img class="align-content" src="{{asset('backend/images/logo.png')}}" alt="">
                    </a>
                </div>
                <div class="login-form">
                <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group">
                            <label>{{ __('E-Mail Address') }}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                            <div class="form-group">
                                <label>{{ __('Password') }}</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                                <div class="checkbox">
                                <label>
                                    <input class="" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    {{__('Remember Me')}}
                                </label>
                                <label class="pull-right">
                                @if (Route::has('password.request'))
                                    <a href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                                
                            </label>

                            </div>
                            <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30">Sign in</button>
                            
                            <div class="register-link m-t-15 text-center">
                                <p>Don't have account ? <a href="{{ route('register') }}"> Sign Up Here</a></p>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
