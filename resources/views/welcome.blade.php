@extends('layouts.frontend.app')

@section('content')
<style>
    .slider {
        background: url(/hero/hero_acbb4.jpg) no-repeat;
        background-size: cover;
        min-height: 800px; 
    }

    #overlay {
        position: fixed; /* Sit on top of the page content */
        display: none; /* Hidden by default */
        width: 100%; /* Full width (cover the whole page) */
        height: 100%; /* Full height (cover the whole page) */
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: rgba(0,0,0,0.5); /* Black background with opacity */
        z-index: 2; /* Specify a stack order in case you're using a different order for other elements */
        cursor: pointer; /* Add a pointer on hover */
    }

</style>
    <!-- SLIDER -->
    <section class="slider d-flex align-items-center">
    <div id="overlay"></div>
    <!-- <img src="{{asset('hero/hero_acbb.jpg')}}" class="img-fluid" alt="#"> -->
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-md-12">
                    <div class="slider-title_box">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="slider-content_wrap">
                                    <h1 style="color: #3eff15">Discover great places in Anambra </h1>
                                    <h5 class="text-warning" style="font-weight: 900; color: yellow;">Join millions of people 
                                        <strong class="text-" style="font-weight: 900; color: red;">EXPLORE</strong> the beautiful nature in <strong class="text-white">ANAMBRA</strong></h5>
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
                                    <a href="#" class="text-white" style="font-size: 23px;">Browse Popular</a><span class="text-danger">or</span> <a href="#" class="text-warning"  style="font-size: 23px;">Recently Added</a>
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
                        <h3>Explore Posts by Categories</h3>
                    </div>
                </div>
            </div>
            <div class="row">
            @foreach($categories as $category)
            <div class="col-md-4">
                <div class="find-place-img_wrap">
                    <div class="grid">
                        <a href="{{route('postsbycategory', $category->slug)}}"><figure class="effect-ruby">
                            <img src="/storage/{{$category->image}}" class="img-fluid" alt="img13" />
                            <figcaption>
                                <h5>{{$category->name}} </h5>
                                <p>{{$category->count()}} Posts</p>
                            </figcaption>
                            </figure>
                        </a>
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
                        <a href="#">
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
                                   <h6 class="text-success">{{ucfirst( str_limit($post->title, $limit = 200, $end = '...')) }}</h6>
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
                                        <a href="#"><p class="text-primary">{{$post->user->localGovern->name}} L.G.A</p></a>
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
                        <a href="{{route('allposts')}}" class="btn btn-danger">VIEW ALL</a>
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
                        <p>Let others hear your thoughts about our motherLand</p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <div class="featured-btn-wrap">
                        <a href="{{route('user.create.post')}}" class="btn btn-danger"><span class="ti-plus"></span> ADD POST</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--//END ADD LISTING -->
    <script>
        function on() {
        document.getElementById("overlay").style.display = "block";
        }

        function off() {
        document.getElementById("overlay").style.display = "none";
        }
    </script>
@endsection