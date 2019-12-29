@extends('layouts.backend.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            @include('layouts.frontend.partial.message')
                <div class="card-header">Update Profile</div>
                <div class="card-body">
                   <form action="{{route('user.profile.update', $profile->id)}}" 
                        method="post" enctype='multipart/form-data'> 
                        @csrf @method('put')
                    
                        <div class="form-group">
                            <label for="name" class="col-md-8 col-form-label text-md-left">{{ __('Name') }}</label>

                            <div class="col-md-12">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" 
                                name="name" value="{{ $profile->user->name }}" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group">
                        <label for="username" class="col-md-8 col-form-label text-md-left">{{ __('username') }}</label>
                            <div class="col-md-12">             
                            <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" 
                                name="username" value="{{ $profile->user->username }}" autofocus>

                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                        <label for="email" class="col-md-8 col-form-label text-md-left">{{ __('Email Address') }}</label>
                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" 
                                    name="email" value="{{ $profile->user->email }}" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                        <label for="image" class="col-md-8 col-form-label text-md-left">{{ __('Profile Image') }}</label>
                            <div class="col-md-12">
                                <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" 
                                    name="image" value="{{ $profile->image }}" autofocus>

                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                        <label for="phone" class="col-md-8 col-form-label text-md-left">{{ __('Mobile Number') }}</label>
                            <div class="col-md-12">
                                <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" 
                                    name="phone" value="{{ $profile->phone }}" autofocus>

                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                        <label for="town_id" class="col-md-8 col-form-label text-md-left">{{ __('Town') }}</label>
                            <div class="col-md-12">
                                <select type="text"  name="town_id"  class="form-control">
                                    <!-- <option value="">Choose your Town</option> -->
                                    @foreach($town as $tw)
                                        <option value="{{$tw->id}}">{{$tw->name}}</option>v
                                    @endforeach
                                </select>
                                @error('town_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                            <div class="form-group">
                            <label for="bio" class="col-md-8 col-form-label text-md-left">{{ __('About You ?') }}</label>
                            <div class="col-md-12">
                                <textarea type="text" name="bio" class="form-control">{{$profile->bio}}</textarea>
                                @error('bio')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <br>
                        <div class="form-group mt-5">
                        <div class="col-md-8">
                            <button type="submit" class="btn btn-primary mr-2">Save</button>
                            <a href="{{route('user.profile.show', $profile->id)}}" class="btn btn-danger">Back</a>
                        </div>
                        </div>
                   </form>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection