<x-app-layout>
    <!-- inner page banner -->
    <section class="innerpage_banner">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="full">
                        <div class="page_title">
                            <div class="full heading_s1">
                                <h2><span>Our team</span></h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end inner page banner -->

    <!-- service section -->
    <section class="layout_padding services_section white_bg">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="full heading_s2 text_align_center margin_bottom_0">
                        <h2><img src="images/icon_head.png" alt="#"><br><span>Team</span></h2>
                        <p class="large">Our expert to care your pets</p>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($team_members as $team_member)
                    <div class="col-sm-6 col-md-6 col-lg-4 margin_top_30">
                        <div class="full">
                            <div class="team_img">
                                <img class="img-responsive" src="{{ $team_member->member_image }}" alt="#" />
                            </div>
                            <div class="team_cont">
                                <h3>{{ $team_member->member_name }}</h3>
                                <p>{{ $team_member->member_role }}</p>
                            </div>
                            <div class="team_social_icon">
                                <ul>
                                    <li><a href="{{ $team_member->member_facebook }}"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="{{ $team_member->member_twitter }}"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="{{ $team_member->member_linkedin }}"><i class="fa fa-linkedin"></i></a></li>
                                    <li><a href="{{ $team_member->member_google_plus }}"><i class="fa fa-google-plus"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- end service section -->
</x-app-layout>
