<!-- header -->
<header class="header">
    <div class="container">
        <div class="row header_top_section">
            <div class="col-lg-3">
                <div class="full">
                    <div class="logo">
                        <a href="/"><img src="{{ ('images/logo.png') }}" alt="#" /></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 site_information">g
                <div class="row">
                    <div class="col-md-4">
                        <ul>
                            <li>
                                <span class="icon_img"><img src="images/mail_icon.png" alt="#" /></span>
                                <span class="infor_text"><strong class="theme_color">Mail us:</strong><br>{{ $globalSettings->website_email }}</span>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-4">
                        <ul>
                            <li>
                                <span class="icon_img"><img src="images/phone_icon.png" alt="#" /></span>
                                <span class="infor_text"><strong class="theme_color">Call us:</strong><br>{{ $globalSettings->website_phone_number }}</span>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-4">
                        <ul>
                            <li>
                                <span class="icon_img"><img src="images/location_icon.png" alt="#" /></span>
                                <span class="infor_text"><strong class="theme_color">Address:</strong><br>{{ $globalSettings->website_contact_address }}</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="full header_bottom_section">
                    <div class="main_menu">
                        <nav class="navbar navbar-inverse navbar-toggleable-md">
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#cloapediamenu" aria-controls="cloapediamenu" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="float-left">Menu</span>
                                <span class="float-right"><i class="fa fa-bars"></i> <i class="fa fa-close"></i></span>
                            </button>
                            <div class="collapse navbar-collapse justify-content-md-center" id="cloapediamenu">
                                <ul class="navbar-nav">
                                    <li class="nav-item">
                                        <a class="nav-link" href="/">Home</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="/our-dogs">Our Dogs</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="/puppies-breedings">Puppies</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="/puppies-breedings">Breedings</a>
                                    </li>
                                    <li class="nav-item dropdown has-submenu">
                                        <a class="nav-link dropdown-toggle" id="dropdown03" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Services</a>
                                        <ul class="dropdown-menu" aria-labelledby="dropdown02">
                                            <li><a class="dropdown-item" href="/about-us">Dog training</a></li>
                                            <li><a class="dropdown-item" href="/our-team">Example.</a></li>
                                            <li><a class="dropdown-item" href="/contact-us">Example 2.</a></li>
                                        </ul>
                                    </li>
                                    <li class="nav-item dropdown has-submenu">
                                        <a class="nav-link dropdown-toggle" href="/about-us" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">About us</a>
                                        <ul class="dropdown-menu" aria-labelledby="dropdown02">
                                            <li><a class="dropdown-item" href="/about-us">About us</a></li>
                                            <li><a class="dropdown-item" href="/our-team">Our Team</a></li>
                                            <li><a class="dropdown-item" href="/contact-us">Contact us</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                    <div class="search_bar">
                        <form action="https://html.design/demo/petto/index.html">
                            <input type="text" class="search_field" placeholder="Search" required="" />
                            <button class="search_button" type="button"><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- end header -->

