<x-app-layout>
    <!-- slider -->
    <section class="slider_section">
        <div class="container-fluid">
            <div class="row">
                <div id="main_slider" class="carousel slide carousel-fade" data-ride="carousel" data-interval="5000">
                    <div class="carousel-inner">
                        <div class="carousel-item slider_inner slider1 active">
                            <div class="container">
                                <div class="row">
                                    <div class="slider_coint_inner">
                                        <h3>Let’s take care<br>of our pets</h3>
                                        <p>-Best Place for your pet..!</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item slider_inner slider2">
                            <div class="container">
                                <div class="row">
                                    <div class="slider_coint_inner">
                                        <h3>Let’s take care<br>of our pets</h3>
                                        <p>-Best Place for your pet..!</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item slider_inner slider3">
                            <div class="container">
                                <div class="row">
                                    <div class="slider_coint_inner">
                                        <h3>Let’s take care<br>of our pets</h3>
                                        <p>-Best Place for your pet..!</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="slider_bullets">
                            <ol class="carousel-indicators">
                                <li data-target="#main_slider" data-slide-to="0" class="active"></li>
                                <li data-target="#main_slider" data-slide-to="1"></li>
                                <li data-target="#main_slider" data-slide-to="2"></li>
                            </ol>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#main_slider" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#main_slider" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!-- end slider -->

    <!-- about section -->
    <section class="layout_padding section padding_bottom_0">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-md-8 col-sm-12">
                    <div class="full heading_s1">
                        <h2><span>About us</span></h2>
                    </div>
                    <div class="full">
                        <h3 class="margin_top_30">Welcome to Petto</h3>
                    </div>
                    <div class="full">
                        <p class="large">Sed ut perspiciatis unde omnis iste natus error sit volupta accus antium doloremque laudantium, totam rem aperiameaque ipsaquae ab illo inventore
                            veritatis et quasi architecto beatae vitae dicta sunt explicabo.....<br><br>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed
                            quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur,
                            adipisci velit, sed quia....
                        </p>
                        <div class="readmore_bt margin_top_30">
                            <a class="main_bt read_more_bt mb-5" href="about.html">Read More ></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-md-4 col-sm-12">
                    <div class="about_img">
                        <img src="https://pngimg.com/d/dog_PNG50327.png" alt="#" />
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end about section -->
    <!-- counter section -->
    <section class="counter_section section dark-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4">
                    <div class="stat-count count_first">
                        <div class="counter_icon"><img src="images/hc_icon.png" alt="#" /></div>
                        <div class="counter_cont">
                            <h3>Happy Client</h3>
                            <h4 class="stat-timer">2169</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="stat-count count_second">
                        <div class="counter_icon"><img src="images/aw_icon.png" alt="#" /></div>
                        <div class="counter_cont">
                            <h3>Awards Winned</h3>
                            <h4 class="stat-timer">920</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="stat-count count_thirt">
                        <div class="counter_icon"><img src="images/pc_icon.png" alt="#" /></div>
                        <div class="counter_cont">
                            <h3>Project Completed</h3>
                            <h4 class="stat-timer">3200+</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end counter section -->
    <!-- pets family section -->

    @if($dogs->count() > 0)
    <section class="layout_padding white_bg pets_information_section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="full heading_s2 text_align_center margin_bottom_50">
                        <h2><br><span>Our latest dogs</span></h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($dogs as $dog)
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <!-- pets inform -->
                    <div class="pet_info">
                        <div class="pet_img">
                            <img class="img-responsive" src="{{ $dog->dog_image }}" alt="#" />
                            <a style="text-decoration: none; align-content: center;" href=" {{ route('dog.view', $dog->dog_slug) }} "><div class="overview_search"><i class="fa fa-search"></i></div></a>
                        </div>
                        <div class="petinfo">
                            <div class="pet_infotop">
                                <h3 class="pet_name">{{ $dog->dog_name }}</h3>
                                <h4 class="pet_price">${{ $dog->dog_price }}</h4>
                            </div>
                            <div class="pet_infobottom">
                                <ul>
                                    <li>Gender: {{ $dog->dog_gender }}</li>
                                    <li>Age: {{ $dog->dog_age }} years</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    </a>
                    <!-- end pets inform -->
                </div>
                @endforeach
                <div class="col-sm-12">
                    <div class="readmore_bt center margin_top_20">
                        <a class="main_bt read_more_bt" href="/our-dogs">See More ></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif

    <!-- end pets family section -->
    <!-- service section -->
    <section class="layout_padding services_section yellow_bg">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="full heading_s2 text_align_center margin_bottom_50">
                        <h2><br><span>Our Services</span></h2>
                    </div>
                </div>
            </div>
            <div class="row margin_bottom_30">
                <div class="col-xl-9">
                    <div class="row service_blog">
                        <div class="col-md-5 col-lg-5 service_img">
                            <img class="rounded-circle img-responsive" src="images/sr1.png" alt="#" />
                        </div>
                        <div class="col-md-7 col-lg-7">
                            <h3>Pets Caring</h3>
                            <p class="large_1">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore.....</p>
                            <div class="readmore_bt margin_top_20">
                                <a class="main_bt read_more_bt" href="services.html">See More ></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3">
                </div>
            </div>
            <div class="row margin_bottom_30">
                <div class="col-xl-3">
                </div>
                <div class="col-xl-9">
                    <div class="row service_blog">
                        <div class="col-md-5 col-lg-5 service_img">
                            <img class="rounded-circle img-responsive" src="images/sr2.png" alt="#" />
                        </div>
                        <div class="col-md-7 col-lg-7">
                            <h3>Pets health care</h3>
                            <p class="large_1">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore.....</p>
                            <div class="readmore_bt margin_top_20">
                                <a class="main_bt read_more_bt" href="services.html">See More ></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row margin_bottom_30">
                <div class="col-xl-9">
                    <div class="row service_blog">
                        <div class="col-md-5 col-lg-5 service_img">
                            <img class="rounded-circle img-responsive" src="images/sr3.png" alt="#" />
                        </div>
                        <div class="col-md-7 col-lg-7">
                            <h3>Insured & Checked</h3>
                            <p class="large_1">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore.....</p>
                            <div class="readmore_bt margin_top_20">
                                <a class="main_bt read_more_bt" href="services.html">See More ></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3">
                </div>
            </div>
            <div class="row margin_bottom_30">
                <div class="col-xl-3">
                </div>
                <div class="col-xl-9">
                    <div class="row service_blog">
                        <div class="col-md-5 col-lg-5 service_img">
                            <img class="rounded-circle img-responsive" src="images/sr4.png" alt="#" />
                        </div>
                        <div class="col-md-7 col-lg-7">
                            <h3>Pet Training</h3>
                            <p class="large_1">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore.....</p>
                            <div class="readmore_bt margin_top_20">
                                <a class="main_bt read_more_bt" href="services.html">See More ></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-9">
                    <div class="row service_blog">
                        <div class="col-md-5 col-lg-5 service_img">
                            <img class="rounded-circle img-responsive" src="images/sr5.png" alt="#" />
                        </div>
                        <div class="col-md-7 col-lg-7">
                            <h3>Vaccines</h3>
                            <p class="large_1">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore.....</p>
                            <div class="readmore_bt margin_top_20">
                                <a class="main_bt read_more_bt" href="services.html">See More ></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3">
                </div>
            </div>
        </div>
    </section>
    <!-- end service section -->
    <!-- gallery section -->
    <section class="layout_padding gallery_section white_bg">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="full heading_s2 text_align_center margin_bottom_50">
                        <h2><br><span>Gallery</span></h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-sm-3 margin_bottom_30">
                    <a href="images/g1.png" data-toggle="lightbox" data-gallery="example-gallery">
                        <img src="images/g1.png" class="img-fluid" alt="#" />
                    </a>
                </div>
                <div class="col-sm-9">
                    <div class="row">
                        <div class="col-sm-8 margin_bottom_30">
                            <a href="images/g2.png" data-toggle="lightbox" data-gallery="example-gallery">
                                <img src="images/g2.png" class="img-fluid" alt="#" />
                            </a>
                        </div>
                        <div class="col-sm-4 margin_bottom_30">
                            <a href="images/g3.png" data-toggle="lightbox" data-gallery="example-gallery">
                                <img src="images/g3.png" class="img-fluid" alt="#" />
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4 margin_bottom_30">
                            <a href="images/g4.png" data-toggle="lightbox" data-gallery="example-gallery">
                                <img src="images/g4.png" class="img-fluid" alt="#" />
                            </a>
                        </div>
                        <div class="col-sm-8 margin_bottom_30">
                            <a href="images/g5.png" data-toggle="lightbox" data-gallery="example-gallery">
                                <img src="images/g5.png" class="img-fluid" alt="#" />
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 margin_bottom_30">
                    <a href="images/g6.png" data-toggle="lightbox" data-gallery="example-gallery">
                        <img src="images/g6.png" class="img-fluid" alt="#" />
                    </a>
                </div>
                <div class="col-sm-6">
                    <a href="images/g7.png" data-toggle="lightbox" data-gallery="example-gallery">
                        <img src="images/g7.png" class="img-fluid" alt="#" />
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!-- end gallery section -->
    <!-- price table section -->
    <section class="layout_padding price_section white_bg">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="full heading_s2 text_align_center margin_bottom_50">
                        <h2><br><span>Our Services</span></h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- price_table -->
                <div class="col-md-6 col-lg-4">
                    <div class="price_table">
                        <img class="full head_blog_img" src="images/price_blog1.png" alt="#" />
                        <div class="full price_cont_blog">
                            <div class="price_head">
                                <h3><small>Hurry to grap your offer now</small><br>Basic</h3>
                                <h3 class="price_tag">$70</h3>
                            </div>
                            <div class="price_cont">
                                <ul>
                                    <li>> Review of Safety Program</li>
                                    <li>> Annual Sexual Harassment Training</li>
                                    <li>> Monthly Newsletter</li>
                                    <li>> Safety Training Topics</li>
                                </ul>
                            </div>
                            <div class="price_bottom">
                                <div class="full center">
                                    <a class="main_bt" href="price.html">Buy Now ></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end price_table -->
                <!-- price_table -->
                <div class="col-md-6 col-lg-4">
                    <div class="price_table">
                        <img class="full head_blog_img" src="images/price_blog2.png" alt="#" />
                        <div class="full price_cont_blog">
                            <div class="price_head">
                                <h3><small>Hurry to grap your offer now</small><br>Premium</h3>
                                <h3 class="price_tag">$80</h3>
                            </div>
                            <div class="price_cont">
                                <ul>
                                    <li>> Review of Safety Program</li>
                                    <li>> Annual Sexual Harassment Training</li>
                                    <li>> Monthly Newsletter</li>
                                    <li>> Safety Training Topics</li>
                                </ul>
                            </div>
                            <div class="price_bottom">
                                <div class="full center">
                                    <a class="main_bt" href="price.html">Buy Now ></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end price_table -->
                <!-- price_table -->
                <div class="col-md-3 only_md_display"></div>
                <div class="col-md-6 col-lg-4">
                    <div class="price_table">
                        <img class="full head_blog_img" src="images/price_blog3.png" alt="#" />
                        <div class="full price_cont_blog">
                            <div class="price_head">
                                <h3><small>Hurry to grap your offer now</small><br>Standard</h3>
                                <h3 class="price_tag">$90</h3>
                            </div>
                            <div class="price_cont">
                                <ul>
                                    <li>> Review of Safety Program</li>
                                    <li>> Annual Sexual Harassment Training</li>
                                    <li>> Monthly Newsletter</li>
                                    <li>> Safety Training Topics</li>
                                </ul>
                            </div>
                            <div class="price_bottom">
                                <div class="full center">
                                    <a class="main_bt" href="price.html">Buy Now ></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end price_table -->
            </div>
        </div>
    </section>
    <!-- end price table section -->

    <!-- testimonial section -->
    <section class="layout_padding dark-section testimonial_section">
        <div class="container">
            <div class="row">
                <div class="col-md-12 white_fonts">
                    <div class="full heading_s2 text_align_center margin_bottom_50">
                        <h2><img src="images/icon_head_white.png" alt="#"><br><span>Testimonials</span></h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div id="testimonial_slider" class="carousel slide" data-ride="carousel">
                        <!-- Carousel indicators -->
                        <ol class="carousel-indicators">
                            <li data-target="#testimonial_slider" data-slide-to="0" class="active"></li>
                            <li data-target="#testimonial_slider" data-slide-to="1"></li>
                            <li data-target="#testimonial_slider" data-slide-to="2"></li>
                        </ol>
                        <!-- Wrapper for carousel items -->
                        <div class="carousel-inner">
                            <div class="item carousel-item active">
                                <div class="testimonial_inner_blog">
                                    <div class="testimonial_cont">
                                        <p>Sed ut perspiciatis unde omnis iste natus<br>
                                            error sit voluptatem accusantium doloremque<br>
                                            laudantium, totam rem aperiam,<br>
                                            eaque ipsa.....<br><br><strong>- Daniel Mark</strong>
                                        </p>
                                    </div>
                                    <div class="client_img">
                                        <div class="media-left">
                                            <img src="images/client_img.png" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item carousel-item">
                                <div class="testimonial_inner_blog">
                                    <div class="testimonial_cont">
                                        <p>Sed ut perspiciatis unde omnis iste natus<br>
                                            error sit voluptatem accusantium doloremque<br>
                                            laudantium, totam rem aperiam,<br>
                                            eaque ipsa.....<br><br><strong>- Daniel Mark</strong>
                                        </p>
                                    </div>
                                    <div class="client_img">
                                        <div class="media-left">
                                            <img src="images/client_img.png" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item carousel-item">
                                <div class="testimonial_inner_blog">
                                    <div class="testimonial_cont">
                                        <p>Sed ut perspiciatis unde omnis iste natus<br>
                                            error sit voluptatem accusantium doloremque<br>
                                            laudantium, totam rem aperiam,<br>
                                            eaque ipsa.....<br><br><strong>- Daniel Mark</strong>
                                        </p>
                                    </div>
                                    <div class="client_img">
                                        <div class="media-left">
                                            <img src="images/client_img.png" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end testimonial section -->

    <!-- faq section -->
    @if($faqs->count() > 0)
    <section class="layout_padding price_section white_bg">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="full heading_s2 text_align_center margin_bottom_50">
                        <h2><br><span>Frequently Asked Questions</span></h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-10 mx-auto">
                    <div id="faq" class="accordion faq_section">
                            @foreach ($faqs as $index => $faq)
                                <div class="card">
                                    <div class="card-header p-2" id="faq-{{ $index }}">
                                        <h5 class="mb-0">
                                            <button class="btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapse{{ $index }}" aria-expanded="true" aria-controls="collapse{{ $index }}">
                                                Q: {{ $faq->question }}
                                            </button>
                                        </h5>
                                    </div>
                                    <div id="collapse{{ $index }}" class="collapse @if($index == 0) show @endif" aria-labelledby="heading{{ $index }}" data-parent="#faq">
                                        <div class="card-body">
                                            <p>{{ $faq->answer }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    @else
        <p>No FAQs available.</p>
    @endif
    <!-- end faq section -->



    <x-subscribe-form />

</x-app-layout>
