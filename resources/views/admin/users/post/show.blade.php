@extends('layouts.frontend.app')

@section('content')
<div>
        <!-- Swiper -->
        <div class="swiper-container">
            <div class="swiper-wrapper">
            @foreach($postCategory as $post)
                <div class="swiper-slide">
                    <a href="">
                    <figure class="effect-ruby">
                        <img src="{{asset('frontend/images/reserve-slide2.jpg')}}" class="img-fluid" alt="img13" />
                        <figcaption>
                          <h6>{{ str_limit($post->title, $limit = 35, $end = '...') }}</h6>
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
    <section class="reserve-block">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h5>{{$post->title}}</h5>
                    <!-- <p><span>$$$</span>$$</p>
                    <p class="reserve-description">Innovative cooking, paired with fine wines in a modern setting.</p> -->
                </div>
                <div class="col-md-6">
                    <div class="reserve-seat-block">
                        <div class="reserve-rating">
                            <span>{{$post->view_count}}</span>
                        </div>
                        <div class="review-btn">
                            <a href="#" class="btn btn-outline-danger">Leave a Comment</a>
                            <span>34 Comments</span>
                        </div>
                        <!-- <div class="reserve-btn">
                            <div class="featured-btn-wrap">
                                <a href="#" class="btn btn-danger">RESERVE A SEAT</a>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="light-bg booking-details_wrap">
        <div class="container">
            <div class="row">
                <div class="col-md-8 responsive-wrap">
                    <div class="booking-checkbox_wrap">
                        <div class="booking-checkbox">
                            <p>{{$post->content}}</p>
                            <hr>
                            <br>
                            <div class="col-md-12 text-center">
                                <img src="{{asset('frontend/images/featured2.jpg')}}" class="img-fluid" alt="#">
                            </div>
                            <br>
                            <hr>
                        </div>
                    <div class="booking-checkbox_wrap mt-4">
                        <h5>34 Comments</h5>
                        <hr>
                        <div class="customer-review_wrap">
                            <div class="customer-img">
                                <img src="{{asset('frontend/images/customer-img1.jpg')}}" class="img-fluid" alt="#">
                                <p>Amanda G</p>
                                <span>35 Comments</span>
                            </div>
                            <div class="customer-content-wrap">
                                <div class="customer-content">
                                    <div class="-review">
                                       <h6>A hole-in-the-wall old school shop.</h6>
                                    </div>
                                    <div class="customer"></div>
                                </div>
                                <p class="customer-text">I love the noodles here but it is so rare that I get to come here. Tasty Hand-Pulled Noodles is the best type of whole in the wall restaurant. The staff are really nice, and you should be seated quickly. I usually get the
                                    hand pulled noodles in a soup. House Special #1 is amazing and the lamb noodles are also great. If you want your noodles a little chewier, get the knife cut noodles, which are also amazing. Their dumplings are great
                                    dipped in their chili sauce.
                                </p>
                            </div>
                        </div>
                        <hr>
                      
                    </div>
                </div>
               
            </div>
        </div>
    </section>

@endsection