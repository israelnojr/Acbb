@extends('layouts.frontend.app')

@section('content')
<style>
    .slider {
        background: url(/hero/hero_acbb_1.jpg) no-repeat;
        background-size: cover;
        min-height: 800px; 
    }
</style>
<section class="slider d-flex align-items-center">
    <!-- <img src="{{asset('hero/hero_acbb.jpg')}}" class="img-fluid" alt="#"> -->
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-md-12">
                    <div class="slider-title_box">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="slider-content_wrap">
                                    <h1>Discover great places in Anambra </h1>
                                    <h5 class="text-warning">Join millions of people <strong class="text-danger">EXPLORE</strong> the beautiful nature in <strong class="text-white">ANAMBRA</strong></h5>
                                </div>
                            </div>
                        </div>
                        <div class="row d-flex justify-content-center">
                            <div class="col-md-10">
                                <form class="form-wrap mt-4">
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <input type="text" placeholder="Search for people, places in anambra, political parties" class="btn-group1 col-md-10">
                                      
                                        <button type="submit" class="btn-form"><span class="icon-magnifier search-icon"></span>SEARCH<i 
                                        class="pe-7s-angle-right"></i></button>
                                    </div>
                                </form>
                                <div class="slider-link">
                                    <a href="#" class="text-danger">Browse Popular</a><span>or</span> <a href="#" class="text-warning">Recently Addred</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--// SLIDER -->
    <!--============================= FEATURED PLACES =============================-->
    <section class="main-block light-bg">
        <div class="container">
            <!-- <div class="row justify-content-center">
                <div class="col-md-5">
                    <div class="styled-heading">
                        <h3>Featured Posts</h3>
                    </div>
                </div>
            </div> -->
            <div class="row">           
                @foreach($posts as $post)
                <div class="col-md-4 featured-responsive" style="margin-bottom:20px;">
                    <div class="featured-place-wrap">
                        <a href="detail.html">
                            <img src="storage/{{$post->image}}" class="img-fluid" alt="#">
                            @if($post->view_count > 0 && $post->view_count < 10)
                            <span class="featured-rating">
                                <span class="text-center" >{{$post->view_count}}</span>
                            </span>
                            @endif

                            @if($post->view_count > 10 && $post->view_count < 99)
                            <span class="featured-rating bg-primary">
                                <span class="text-center" >{{$post->view_count}}</span>
                            </span>
                            @elseif($post->view_count > 99)
                            <span class="featured-rating bg-success">
                                <span class="text-center" >99+</span>
                            </span>
                            @endif
                            <div class="featured-title-box">
                            <a href="{{route('show.post', $post->slug)}}"> 
                                   <h6 class="text-success">{{ str_limit($post->title, $limit = 150, $end = '...') }}</h6>
                                </a>                            
                                <p class="">
                                    <!-- <strong class="icon-user text-warning"></strong>  -->
                                    <a href="{{ route('user.profile.show', $post->user->id)}}" class="text-info" style="margin-right:3px;"> <span class="ti-user">
                                    </span> {{ str_limit('@' .$post->user->username, $limit = 12, $end = '...') }}</a> 
                                </p>                           
                                <span>• </span> <p class="text-danger">Likes: 3</p> <span> • </span>
                                <p><span>Share: </span> 32</p>
                                <ul>
                                    <li class="d-flex"><span class="icon-location-pin text-danger"></span>
                                        <a href=""><p class="text-primary">{{$post->user->localGovern->name}} L.G.A</p></a>
                                    </li>
                                </ul>
                                <div class="bottom-icons">
                                    <div class="open-now">  <a href="{{route('show.post', $post->slug)}}" class="text-warning">Read More</a></div>
                                    <span><a href="" class="ti-heart text-danger"></a></span>
                                   <span> <a href="" class="ti-bookmark text-primary"></a></span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
    </section>
@endsection