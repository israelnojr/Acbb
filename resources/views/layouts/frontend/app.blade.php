<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>{{ config('app.name', 'Political forum for the people of anambra state') }}</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">
  <meta name="keywords" content="Political forum for the people of anambra state">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css')}}">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,400i,500,700,900" rel="stylesheet">
    <!-- Simple line Icon -->
    <link rel="stylesheet" href="{{ asset('frontend/css/simple-line-icons.css')}}">
    <!-- Themify Icon -->
    <link rel="stylesheet" href="{{ asset('frontend/css/themify-icons.css')}}">
    <!-- Hover Effects -->
    <link rel="stylesheet" href="{{ asset('frontend/css/set1.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/swiper.min.css')}}">
    <!-- Magnific Popup CSS -->
    <link rel="stylesheet" href="{{asset('frontend/css/magnific-popup.css')}}">
    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css')}}">
</head>

<body>
  @include('layouts.frontend.partial.topbar')
  @yield('content')
  @include('layouts.frontend.partial.footer')


  <!-- JavaScript Libraries -->
  <!-- jQuery, Bootstrap JS. -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="{{ asset('frontend/js/jquery-3.2.1.min.js')}}"></script>
    <script src="{{ asset('frontend/js/popper.min.js')}}"></script>
    <script src="{{ asset('frontend/js/bootstrap.min.js')}}"></script>

    <script>
        $(window).scroll(function() {
            // 100 = The point you would like to fade the nav in.

            if ($(window).scrollTop() > 100) {

                $('.fixed').addClass('is-sticky');

            } else {

                $('.fixed').removeClass('is-sticky');

            };
        });
    </script>

  <!-- Template Main Javascript File -->
  <script src="{{asset('frontend/js/main.js')}}"></script>
  <script src="{{asset('/js/message.js')}}"></script>

<!-- jQuery, Bootstrap JS. -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="{{asset('frontend/js/jquery-3.2.1.min.js')}}"></script>
    <script src="{{asset('frontend/js/popper.min.js')}}"></script>
    <script src="{{asset('frontend/js/bootstrap.min.js')}}"></script>
    <!-- Magnific popup JS -->
  <script src="{{asset('frontend/js/jquery.magnific-popup.js')}}"></script>
    <!-- Swipper Slider JS -->
    <script src="{{asset('frontend/js/swiper.min.js')}}"></script>
    <script>
        var swiper = new Swiper('.swiper-container', {
            slidesPerView: 3,
            slidesPerGroup: 3,
            loop: true,
            loopFillGroupWithBlank: true,
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
        });
    </script>
    <script>
        if ($('.image-link').length) {
            $('.image-link').magnificPopup({
                type: 'image',
                gallery: {
                    enabled: true
                }
            });
        }
        if ($('.image-link2').length) {
            $('.image-link2').magnificPopup({
                type: 'image',
                gallery: {
                    enabled: true
                }
            });
        }
    </script>
</body>
</html>