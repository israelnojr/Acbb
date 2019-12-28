@extends('layouts.backend.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            @include('layouts.frontend.partial.message')
                <div class="card-header">Create Category</div>
                <div class="card-body">
                   <form action="{{route('admin.store.category')}}" 
                        method="post" enctype='multipart/form-data'> 
                        @csrf 
                    
                        <div class="form-group">
                            <label for="name" class="col-md-8 col-form-label text-md-left">{{ __('Category Name') }}</label>

                            <div class="col-md-12">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" 
                                value="{{ old('name') }}"  name="name" autofocus>

                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="image" class="col-md-8 col-form-label text-md-left">{{ __('Featured Image') }}</label>

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
                            <div class="col-md-8" style="margin-top:15px !important;">
                                <button type="submit" class="btn btn-primary mr-2">Create</button>
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