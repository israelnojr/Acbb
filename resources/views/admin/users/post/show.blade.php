@extends('layouts.frontend.app')

<style>
    .header_text{
        position: absolute;
        color: #151414;
        top: 158px;
        left: 4px !important;  
        font-size: 10px;
        text-transform: capitalize !important;
    }
    .related_img{
        height: 140px !important;
    }

    .swiper-container {
        margin: 94px auto !important;
        position: relative;
        overflow: hidden;
        list-style: none;
        padding: 0;
        z-index: 1 !important;
        background-color: transparent;
        height: 186px;
    }

    .customer-img img {
        border-radius: 7% !important;
        width: 52px;
    }
</style>
@section('content')
<div>
        <!-- Swiper -->
        <div class="swiper-container">
            <div class="swiper-wrapper">
            @foreach($postCategory as $post)
                <div class="swiper-slide">
                    <a href="{{route('show.post', $post->slug)}}">
                    <figure class="effect-ruby" style="background:transparent">
                        <img src="/storage/{{$post->image}}" class="img-fluid related_img" alt="img13" />
                        <figcaption>
                          <h6 class="header_text"><a href="{{route('show.post', $post->slug)}}">{{ str_limit($post->title, $limit = 50, $end = '...') }}</a></h6>
                        </figcaption>
                    </figure> 
                    </a>                  
                </div>
            @endforeach
            </div>
            <!-- Add Pagination -->
            <div class="swiper-pagination swiper-pagination-white"></div>
            <!-- Add Arrows -->
            <div class="swiper-button-next swiper-button-white"></div>
            <div class="swiper-button-prev swiper-button-white"></div>
        </div>
    </div>
    <!--//END BOOKING -->
    <section class="reserve-block" >
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h5>{{$post->title}}</h5>
                </div>
                <div class="col-md-6">
                    <div class="reserve-seat-block">
                        <div class="reserve-rating">
                            <span>{{$post->view_count}}</span>
                        </div>
                        <div class="review-btn">
                            <a href="{{route('user.create.comment', $post->id)}}" class="btn btn-outline-danger">Leave a Comment</a>
                            <span>{{$commentCount}} Comments</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="light-bg booking-details_wrap">
        <div class="container">
            <div class="row">
                <div class="col-md-8 responsive-wrap">
                    <div class="col-md-12 text-center">
                        <img src="/storage/{{ $post->image}}" class="img-fluid" alt="#">
                    </div>
                    <div class="booking-checkbox_wrap">
                        <div class="booking-checkbox">
                            <p>{{$post->content}}</p>
                            <hr>
                            <br>
                            @foreach($photos as $photo)
                            <div class="col-md-12 text-center">
                                <img src="/storage/{{ $photo->filename}}" class="img-fluid" alt="#">
                            </div>
                            <br>
                            @endforeach
                            <hr>
                        </div>
                    <div class="booking-checkbox_wrap mt-4">
                        <h5>{{$commentCount}} Comments</h5>
                        <hr> 
                        @foreach($comments as $comment)
                        <div class="customer-review_wrap">
                                <div class="customer-img mr-3">
                                    <img src="{{ $comment->user->profile->profileImage()}}" class="img-fluid" alt="#">
                                    <p>{{$comment->user->name}}</p>
                                    <span>{{$commentUserCount}} Comments</span>
                                </div>
                                <div class="customer-content-wrap">
                                    <div class="customer-content">
                                        <div class="-review">
                                        <h6></h6>
                                        </div>
                                        <div class="customer"></div>
                                    </div>
                                    <p class="customer-text">
                                        {{$comment->comment}}
                                    </p>
                                </div>
                        </div>
                        <hr>
                        @endforeach
                    </div>
                </div>
               
            </div>
        </div>
    </section>

@endsection