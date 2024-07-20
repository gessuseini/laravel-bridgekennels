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
            background: url("http://b-ridgekennels.com/wp-content/uploads/2024/02/pit-bull.png");
        }

        .slider2 {
            background: url("https://png.pngtree.com/background/20230610/original/pngtree-three-black-pit-bull-dogs-sitting-i-front-of-a-window-picture-image_3102248.jpg");
        }

        .slider3 {
            background: url("https://png.pngtree.com/background/20230528/original/pngtree-three-pit-bull-dogs-sitting-in-the-middle-of-some-leaves-picture-image_2774133.jpg");
        }

        .innerpage_banner {
            background: url("http://b-ridgekennels.com/wp-content/uploads/2024/02/pit-bull.png");
        }
    </style>

</head>
<body id="error_page" class="error_page">
    <section class="layout_padding error_section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="full text_align_center margin_bottom_20">
                        <h2>404</h2>
                        <p class="large">Oops! Page Not Found</p>
                        <p>The page you are looking for might have been removed, had its name changed,<br>or is temporarily unavailable.</p>
                    </div>
                    <div class="full">
                        <div class="center">
                            <a class="main_bt" href="/">Return Home</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>
