@extends('layouts.backend.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            @include('layouts.frontend.partial.message')
                <div class="card-header">Post Comment</div>
                <div class="card-body">
                   <form action="{{route('user.store.comment', $post->id)}}" 
                        method="post" enctype='multipart/form-data'> 
                        @csrf                    
                        <div class="form-group">
                            <label for="comment" class="col-md-8 col-form-label text-md-left">{{ __('') }}</label>

                            <div class="col-md-12">
                                <textarea type="text" name="comment" rows="6" class="form-control">{{ old('comment') }}</textarea>
                                @error('comment')
                                    <span class="invalid-feedback alert alert-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                              
                        <div class="form-group">
                            <div class="col-md-8" style="margin-top:15px !important;">
                                <button type="submit" class="btn btn-primary mr-2">Comment</button>
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