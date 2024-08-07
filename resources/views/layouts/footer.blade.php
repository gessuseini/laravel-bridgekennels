<!-- footer -->
<footer class="footer layout_padding">
<div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-12">
                <div class="footer_blog1">
                    <div class="footer_logo"><a href="/"><img style="width: 250px; height: 120px;" src="{{ ('../images/default-monochrome.svg') }}" alt="#" /></a></div>
                    <p>Sed ut perspiciatis unde omnis iste natus<br>error sit voluptatem accusantium doloremque<br>laudantium, totam rem aperiam,<br>eaque ipsa quae ab illo....</p>
                    <div class="footer_social_icon">
                        <ul>
                            <li><a href="{{ $globalSettings->website_facebook }}"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="{{ $globalSettings->website_twitter }}"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="{{ $globalSettings->website_linkedin }}"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="{{ $globalSettings->website_facebook }}"><i class="fa fa-google-plus"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-12">
                <div class="footer_link_heading">
                    <h3>Useful Links</h3>
                </div>
                <div class="footer_blog2">
                    <ul>
                        <li><a href="/">> Home</a></li>
                        <li><a href="/our-dogs">> Our Dogs</a></li>
                        <li><a href="/gallery">> Gallery</a></li>
                        <li><a href="/our-services">> Services</a></li>
                        <li><a href="/about-us">> About us</a></li>
                        <li><a href="/contact-us">> Contact</a></li>
                    </ul>
                    <ul>
                        <li><a href="/frequently-asked-questions">> Frequently asked questions</a></li>
                        <li><a href="">> Privacy Policy</a></li>
                        <li><a href="">> Cookies</a></li>
                        <li><a href="">> Team</a></li>
                        <li><a href="">> Gallery</a></li>
                        <li><a href="">> 404 Error</a></li>
                        <li><a href="">> Faq</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-4 col-sm-12">
                <div class="footer_link_heading">
                    <h3>Contact Us</h3>
                </div>
                <div class="address_infor">
                    <p>
                        <span class="icon"><img src="../images/location.png" alt="#" /></span>
                        <span class="addrs">{{ $globalSettings->website_contact_address }}</span>
                    </p>
                    <p>
                        <span class="icon"><img src="../images/phone.png" alt="#" /></span>
                        <span class="addrs">{{ $globalSettings->website_phone_number }}</span>
                    </p>
                </div>
                <div class="email_address_bottom">
                    <form>
                        <fieldset>
                            <div class="field_email">
                                <input type="email" name="email" placeholder="Email" />
                                <button><i class="fa fa-search"></i></button>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- end footer -->
<!-- copyright section -->
<div class="copyright">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <p>Copyright © {{ $globalSettings->website_name }} 2024. Made by <a style="color: #00d084" href="https://orgesuseini.com/">orgesuseini</a>.</p>
            </div>
        </div>
    </div>
</div>
<!-- end copyright section -->
