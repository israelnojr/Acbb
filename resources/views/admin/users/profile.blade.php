@extends('layouts.backend.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="col-xl-12 col-lg-12 col-sm-12">
                <section class="card mt-3" >
                @include('layouts.frontend.partial.message')
                    <div class="twt-feed blue-bg">
                        <div class="corner-ribon black-ribon">
                            <i class="fa fa-twitter"></i>
                        </div>
                        <div class="fa fa-twitter wtt-mark"></div>

                        <div class="media">
                            <a href="#">
                                <img class="align-self-center rounded-circle mr-3" style="width:85px; height:85px;" 
                                alt="" src="{{asset('backend/images/'.$profile->image)}}">
                            </a>
                            <div class="media-body">
                                <h2 class="text-white display-6">{{ $profile->user->name }}</h2>
                                <p class="text-dark">I'm {{implode(', ', $profile->user->roles()->get()->pluck('name')->toArray()) }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="weather-category twt-category">
                        <ul>
                            <li class="active">
                                <h5>750</h5>
                                Posts Read
                            </li>
                            <li>
                                <h5>865</h5>
                                Comments
                            </li>
                            <li>
                                <h5>3645</h5>
                                Shared
                            </li>
                        </ul>
                    </div>
                    <div class="twt-write col-sm-12">
                        <p rows="2" disabled="true" 
                        class="form-control t-text-area"> <span class="badge badge-primary">About me:</span> {{$profile->bio}}</p>
                    </div>
                    <footer class="twt-footer">
                        <!-- <a href="#"><i class="fa fa-camera"></i></a> -->
                        <a href="#"><i class="fa fa-map-marker"></i></a>
                        <span class="badge badge-warning mr-2">{{ $profile->user->localGovern->name }}</span>
                        <span class="badge badge-primary">{{ $profile->address ?? 'No. 3 Adeyemi Street, Egbeda'}}</span>
                        <span class="pull-right">
                        <span class="badge badge-danger">username: <strong class="badge-light">{{ '@' .$profile->user->username }}</strong></span>
                        </span>
                    </footer>
                </section>
            </div>
        </div>
    </div>
</div>
    <style>
        .badge{
            border-radius: 0px !important;
            padding: 5px !important;
        }
    </style>
@endsection