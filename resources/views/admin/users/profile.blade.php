@extends('layouts.backend.app')

@section('content')
    <div class="col-xl-12 col-lg-12 col-sm-12">
        <section class="card mt-3" >
            <div class="twt-feed blue-bg">
                <div class="corner-ribon black-ribon">
                    <i class="fa fa-twitter"></i>
                </div>
                <div class="fa fa-twitter wtt-mark"></div>

                <div class="media">
                    <a href="#">
                        <img class="align-self-center rounded-circle mr-3" style="width:85px; height:85px;" alt="" src="{{asset('backend/images/admin.jpg')}}">
                    </a>
                    <div class="media-body">
                        <h2 class="text-white display-6">{{ $profile->user->name }}</h2>
                        <p class="text-light">{{ $profile->user->roles()->get()->pluck('name')}}</p>
                    </div>
                </div>
            </div>
            <div class="weather-category twt-category">
                <ul>
                    <li class="active">
                        <h5>750</h5>
                        Tweets
                    </li>
                    <li>
                        <h5>865</h5>
                        Following
                    </li>
                    <li>
                        <h5>3645</h5>
                        Followers
                    </li>
                </ul>
            </div>
            <div class="twt-write col-sm-12">
                <textarea placeholder="Write your Tweet and Enter" rows="1" class="form-control t-text-area"></textarea>
            </div>
            <footer class="twt-footer">
                <a href="#"><i class="fa fa-camera"></i></a>
                <a href="#"><i class="fa fa-map-marker"></i></a>
                {{ $profile->user->state_of_origin }}
                <span class="pull-right">
                    32
                </span>
            </footer>
        </section>
    </div>
@endsection