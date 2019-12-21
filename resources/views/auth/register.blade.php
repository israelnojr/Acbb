@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>
                
                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                      
                        <div class="form-group row">
                            <label for="sponsor" class="col-md-4 col-form-label text-md-right">{{ __('Sponsor') }}</label>

                            <div class="col-md-6">
                               <select class="form-control @error('sponsor_user_id') is-invalid @enderror" name="sponsor_user_id" id="">
                                    <option value="{{ old('sponsor_user_id') ?? __('') }}">{{ old('sponsor_user_id') ?? __('Select Your Zoner Chairman')}}</option>
                                    @foreach($zones as $user)
                                        <option value="{{ $user->id ?? old('sponsor_user_id') }}">{{ $user->name  }}</option>
                                    @endforeach
                               </select>

                                @error('sponsor')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="state_of_origin" class="col-md-4 col-form-label text-md-right">{{ __('State Origin') }}</label>

                            <div class="col-md-6">
                               <select class="form-control @error('state_of_origin') is-invalid @enderror" name="state_of_origin" id="">
                                    <option value="{{ $state->id ?? old('state_of_origin') }}">{{ $state->name }}</option>
                               </select>

                                @error('state_of_origin')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="local_government_id" class="col-md-4 col-form-label text-md-right">{{ __('Local Governments') }}</label>

                            <div class="col-md-6">
                               <select class="form-control @error('local_government_id') is-invalid @enderror" name="local_government_id" id="">
                                    <option value="{{ old('local_government_id') ?? __('') }}">{{ old('local_government_id') ?? __('Choose Local Government')}}</option>
                                    @foreach($localGovernments as $local)
                                        <option value="{{ $local->id ?? old('local_government_id') }}">{{ $local->name }}</option>
                                    @endforeach
                               </select>

                                @error('local_government')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
