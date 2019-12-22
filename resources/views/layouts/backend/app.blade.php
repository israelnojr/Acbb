<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'ReviewServiceClub') }}</title>

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

    <link rel="stylesheet" href="{{ asset('backend/vendors/bootstrap/dist/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('backend/vendors/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{ asset('backend/vendors/themify-icons/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{ asset('backend/vendors/flag-icon-css/css/flag-icon.min.css')}}">
    <link rel="stylesheet" href="{{ asset('backend/vendors/selectFX/css/cs-skin-elastic.css')}}">
    <link rel="stylesheet" href="{{ asset('backend/vendors/jqvmap/dist/jqvmap.min.css')}}">

    <link rel="stylesheet" href="{{ asset('backend/vendors/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{ asset('backend/vendors/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')}}">

    <link rel="stylesheet" href="{{ asset('backend/assets/css/style.css')}}">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

</head>

    <body class="">
        @include('layouts.backend.partials.sidebar')
        <div id="right-panel" class="right-panel">
            @include('layouts.backend.partials.topbar')
            @include('layouts.backend.partials.breadcrumbs')
            @yield('content')
        @include('layouts.backend.partials.footer')
        <script src="{{ asset('backend/vendors/jquery/dist/jquery.min.js')}}"></script>
        <script src="{{ asset('backend/vendors/popper.js/dist/umd/popper.min.js')}}"></script>
        <script src="{{ asset('backend/vendors/bootstrap/dist/js/bootstrap.min.js')}}"></script>
        <script src="{{ asset('backend/assets/js/main.js')}}"></script>


        <script src="{{ asset('backend/vendors/chart.js/dist/Chart.bundle.min.js')}}"></script>
        <script src="{{ asset('backend/assets/js/dashboard.js')}}"></script>
        <script src="{{ asset('backend/assets/js/widgets.js')}}"></script>
        <script src="{{ asset('backend/vendors/jqvmap/dist/jquery.vmap.min.js')}}"></script>
        <script src="{{ asset('backend/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js')}}"></script>
        <script src="{{ asset('backend/vendors/jqvmap/dist/maps/jquery.vmap.world.js')}}"></script>
        
        <script src="{{ asset('backend/vendors/datatables.net/js/jquery.dataTables.min.js')}}"></script>
        <script src="{{ asset('backend/vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
        <script src="{{ asset('backend/vendors/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
        <script src="{{ asset('backend/vendors/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js')}}"></script>
        <script src="{{ asset('backend/vendors/jszip/dist/jszip.min.js')}}"></script>
        <script src="{{ asset('backend/vendors/pdfmake/build/pdfmake.min.js')}}"></script>
        <script src="{{ asset('backend/vendors/pdfmake/build/vfs_fonts.js')}}"></script>
        <script src="{{ asset('backend/vendors/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
        <script src="{{ asset('backend/vendors/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
        <script src="{{ asset('backend/vendors/datatables.net-buttons/js/buttons.colVis.min.js')}}"></script>
        <script src="{{ asset('backend/assets/js/init-scripts/data-table/datatables-init.js')}}"></script>
        
        
        
        <script>
            (function($) {
                "use strict";

                jQuery('#vmap').vectorMap({
                    map: 'world_en',
                    backgroundColor: null,
                    color: '#ffffff',
                    hoverOpacity: 0.7,
                    selectedColor: '#1de9b6',
                    enableZoom: true,
                    showTooltip: true,
                    values: sample_data,
                    scaleColors: ['#1de9b6', '#03a9f5'],
                    normalizeFunction: 'polynomial'
                });
            })(jQuery);
        </script>
    </body>

</html>
