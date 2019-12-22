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
                <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-group">
                        <label for="name">{{ __('Full Name') }}</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="sponsor_user_id">{{ __('Sponsor') }}</label>
                               <select class="form-control @error('sponsor_user_id') is-invalid @enderror" name="sponsor_user_id" id="">
                                    <option value="{{ old('sponsor_user_id') }}">{{ __('Select Your Zoner Chairman')}}</option>
                                    @foreach($zones as $user)
                                        <option value="{{ $user->id }}">{{ $user->name  }}</option>
                                    @endforeach
                               </select>

                                @error('sponsor')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group">
                            <label for="state_of_origin">{{ __('Sponsor') }}</label>
                                <select class="form-control @error('state_of_origin') is-invalid @enderror" name="state_of_origin" id="">
                                    <option value="{{ $state->name }}">{{ $state->name }}</option>
                               </select>

                                @error('state_of_origin')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="form-group">
                            <label for="local_government_id">{{ __('Local Government') }}</label>
                            <select class="form-control @error('local_government_id') is-invalid @enderror" name="local_government_id" id="">
                                <option value="">{{ __('Choose Local Government')}}</option>
                                @foreach($localGovernments as $local)
                                    <option value="{{ $local->id }}">{{ $local->name }}</option>
                                @endforeach
                            </select>

                            @error('local_government')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

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

                        <div class="form-group">
                            <label for="password-confirm" >{{ __('Confirm Password') }}</label>

                            <input id="password-confirm" class="form-control"type="password" name="password_confirmation" required autocomplete="new-password">
                        </div>
                            
                        <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30">Sign Up</button>
                        
                        <div class="register-link m-t-15 text-center">
                            <p>Has an account ? <a href="{{ route('login') }}"> Sign In Here</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
