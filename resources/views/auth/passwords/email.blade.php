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
                <form method="POST" action="{{ route('password.email') }}">
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
                            
                        <button type="submit" class="btn btn-primary btn-flat m-b-30 m-t-30"> {{ __('Send Password Reset Link') }}</button>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection
