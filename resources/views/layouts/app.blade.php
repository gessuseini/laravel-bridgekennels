<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Site Metas -->
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>{{ $globalSettings->website_name }}</title>

    <link rel="icon" href="images/fevicon.png" type="image/png" />

    <link href="{{ asset('assets/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/responsive.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/colors.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/ekko-lightbox.css') }}" rel="stylesheet">



    <link href="{{ asset('fonts/streamline-small/style.css') }}" rel="stylesheet">
    <link href="{{ asset('fonts/template/styles.css') }}" rel="stylesheet">
    <link href="{{ asset('fonts/social/styles.css') }}" rel="stylesheet">

    <style>
        .slider1 {
            background: url("https://b-ridgekennels.com/wp-content/uploads/2024/02/pit-bull.png");
        }

        .slider2 {
            background: url("https://png.pngtree.com/background/20230610/original/pngtree-three-black-pit-bull-dogs-sitting-i-front-of-a-window-picture-image_3102248.jpg");
        }

        .slider3 {
            background: url("https://png.pngtree.com/background/20230528/original/pngtree-three-pit-bull-dogs-sitting-in-the-middle-of-some-leaves-picture-image_2774133.jpg");
        }

        .innerpage_banner {
            background: url("https://b-ridgekennels.com/wp-content/uploads/2024/02/pit-bull.png");
        }
    </style>

</head>
<body id="home_page" class="home_page">
<div>
    <div id="preloader">
        <img class="preloader" src="{{ ('/images/loader.gif') }}" alt="">
    </div>
    <!-- end loader -->
    @include('layouts.navigation')

    <!-- Page Heading -->
    @if (isset($header))
        <header>
            {{ $header }}
        </header>
    @endif

    <!-- Page Content -->
    <div>
        <main>
            {{ $slot }}
        </main>

    </div>
    @include('layouts.footer')
    <!-- Page Footer -->
    @if (isset($footer))
        <footer>
            {{ $footer }}
        </footer>
    @endif
</div>

<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/tether.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/parallax.js') }}"></script>
<script src="{{ asset('js/animate.js') }}"></script>
<script src="{{ asset('js/ekko-lightbox.js') }}"></script>
<script src="{{ asset('js/custom.js') }}"></script>
</body>
</html>
