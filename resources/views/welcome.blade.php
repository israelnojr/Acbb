@extends('layouts.frontend.app')

@section('content')
    <!-- SLIDER -->
    <section class="slider d-flex align-items-center">
        <!-- <img src="images/slider.jpg" class="img-fluid" alt="#"> -->
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-md-12">
                    <div class="slider-title_box">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="slider-content_wrap">
                                    <h1>Discover great places in New york</h1>
                                    <h5>Let's uncover the best places to eat, drink, and shop nearest to you.</h5>
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
                                    <a href="#">Browse Popular</a><span>or</span> <a href="#">Recently Addred</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--// SLIDER -->
    <!--//END HEADER -->
    <!--============================= FIND PLACES =============================-->
    <section class="main-block">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-5">
                    <div class="styled-heading">
                        <h3>Explore Posts by Categeries</h3>
                    </div>
                </div>
            </div>
            <div class="row">
            @foreach($categories as $category)
            <div class="col-md-4">
                <div class="find-place-img_wrap">
                    <div class="grid">
                        <figure class="effect-ruby">
                            <img src="{{asset('frontend/images/'.$category->image)}}" class="img-fluid" alt="img13" />
                            <figcaption>
                                <h5>{{$category->name}} </h5>
                                <p>385 Posts</p>
                            </figcaption>
                        </figure>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>
    <!--//END FIND PLACES -->
    <!--============================= FEATURED PLACES =============================-->
    <section class="main-block light-bg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-5">
                    <div class="styled-heading">
                        <h3>Featured Posts</h3>
                    </div>
                </div>
            </div>
            <div class="row">           
                @foreach($posts as $post)
                <div class="col-md-4 featured-responsive" style="margin-bottom:20px;">
                    <div class="featured-place-wrap">
                        <a href="detail.html">
                            <img src="storage/{{$post->image}}" class="img-fluid" alt="#">
                            <span class="featured-rating">{{$post->view_count}}</span>
                            <div class="featured-title-box">
                               <a href=""> <h6 class="text-success">{{$post->title}}</h6></a>                             
                                <p class="">
                                    <!-- <strong class="icon-user text-warning"></strong>  -->
                                    <a href="#" class="text-info" style="margin-right:3px;"> <span class="ti-user">
                                    </span> {{ '@' .$post->user->username}}</a> 
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
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <div class="featured-btn-wrap">
                        <a href="#" class="btn btn-danger">VIEW ALL</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--//END FEATURED PLACES -->
    <!--============================= CATEGORIES =============================-->
    <section class="main-block">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-5">
                    <div class="styled-heading">
                        <h3>Explore Post By Locations</h3>
                    </div>
                </div>
            </div>
            <div class="row">
            @foreach($locations as $location)
                <div class="col-md-3 category-responsive">
                    <a href="#" class="category-wrap">
                        <div class="category-block">
                            <h6>{{$location->name}}</h6>
                        </div>
                    </a>
                </div>
            @endforeach 
        </div>
    </section>
    <!--//END CATEGORIES -->
    <!--============================= ADD LISTING =============================-->
    <section class="main-block light-bg">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="add-listing-wrap">
                        <h2>Reach millions of People</h2>
                        <p>Add your Business infront of millions and earn 3x profits from our listing</p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <div class="featured-btn-wrap">
                        <a href="#" class="btn btn-danger"><span class="ti-plus"></span> ADD LISTING</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--//END ADD LISTING -->
@endsection