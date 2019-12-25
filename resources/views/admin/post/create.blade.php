@extends('layouts.backend.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            @include('layouts.frontend.partial.message')
                <div class="card-header">Update Profile</div>
                <div class="card-body">
                   <form action="{{route('user.post.store')}}" 
                        method="post" enctype='multipart/form-data'> 
                        @csrf 
                    
                        <div class="form-group">
                            <label for="title" class="col-md-8 col-form-label text-md-left">{{ __('Title') }}</label>

                            <div class="col-md-12">
                                <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" 
                                value="{{ old('title') }}"  name="title" autofocus>

                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="image" class="col-md-8 col-form-label text-md-left">{{ __('Image') }}</label>

                            <div class="col-md-12">
                                <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" 
                                value="{{ old('image') }}" name="image" autofocus>

                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="post_category_id" class="col-md-8 col-form-label text-md-left">{{ __('Categories') }}</label>
                                <div class="col-md-12">
                                    <select type="text"  name="post_category_id"  class="form-control">
                                        <option value="">Choose Category you want to post on</option>
                                        @foreach($categories as $tw)
                                            <option value="{{$tw->id}}">{{$tw->name}}</option>v
                                        @endforeach
                                    </select>
                                    @error('post_category_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                        </div>

                        <div class="form-group">
                            <label for="content" class="col-md-8 col-form-label text-md-left">{{ __('Post Content') }}</label>
                            <div class="col-md-12">
                                <textarea type="text" name="content" rows="6" class="form-control">{{ old('content') }}</textarea>
                                @error('content')
                                    <span class="invalid-feedback alert alert-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                       
                        <div class="form-group">
                            <div class="col-md-8" style="margin-top:15px !important;">
                                <button type="submit" class="btn btn-primary mr-2">Post</button>
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