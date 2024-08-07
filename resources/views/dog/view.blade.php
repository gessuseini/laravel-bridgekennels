<x-app-layout>
    <!-- inner page banner -->
    <section class="innerpage_banner">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="full">
                        <div class="page_title">
                            <div class="full heading_s1">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end inner page banner -->
    <section class="layout_padding white_bg pets_information_section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="full heading_s2 text_align_center margin_bottom_50">
                        <h2><img src="../images/icon_head.png" alt="#"><br><span>Dog Details</span></h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-1 col-lg-12"></div>
                <div class="col-xl-10 col-lg-12">
                    <!-- pets inform -->
                    <div class="pet_info pet_details">
                        <div class="pet_img" style="padding-left: 4rem !important; padding-bottom: 4rem !important; padding-right: 3rem !important;">
                            <img class="img-responsive" src="{{ $dog->dog_image }}" alt="#" />
                        </div>
                        <div class="petinfo h-full">
                            <div class="pet_infotop">
                                <h3 class="pet_name">{{ $dog->dog_name }}</h3>
                                <ul>
                                    <li>Gender : <span class="text-capitalize">{{ $dog->dog_gender }}</span></li>
                                    <li>Age : <span class="text-capitalize">{{ $dog->dog_age }}</span> years</li>
                                    <li>Weight : <span class="text-capitalize">{{ $dog->dog_weight }}</span> kg</li>
                                      <li>Breed : <span class="text-capitalize">{{ $dog->dog_breed }}</span></li>
                                    <li>Type : <span class="text-capitalize">{{ $dog->dog_type }}</span></li>
                                    <li>Size : <span class="text-capitalize">{{ $dog->dog_size }}</span></li>
                                    <li>Color : <span class="text-capitalize">{{ $dog->dog_color }}</span></li>
                                </ul>
                                <div class="full">
                                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium.. </p>
                                </div>
                                <div class="full">
                                    <h4>Price: ${{ $dog->dog_price }}</h4>
                                </div>
                                <div class="full margin_top_10">
                                    <a class="main_bt" href="{{ route('request-dog', ['id' => $dog->id]) }}">Request now ></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end pets inform -->
                </div>
                <div class="col-lg-1 col-md-12"></div>
            </div>
            <div class="row">
                <div class="col-xl-1 col-lg-12"></div>
                <div class="col-xl-10 col-lg-12">
                    <div class="full margin_top_30 margin_bottom_10">
                        <h3><span>Dog Description</span></h3>
                    </div>
                    <div class="full">
                        <p>{{ $dog->dog_description }}</p>
                    </div>
                    <div class="full">
                        <div class="row">
                            <div class="col-sm-12 margin_top_30">
                                <div class="full heading_s1 margin_top_20">
                                    <h3><span>Popular view</span></h3>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                <!-- pets inform -->
                                <div class="pet_info margin_top_30">
                                    <div class="pet_img">
                                        <img class="img-responsive" src="../images/pt1.png" alt="#" />
                                        <div class="overview_search"><a href="pet_details.html"><i class="fa fa-search"></i></a></div>
                                    </div>
                                    <div class="petinfo">
                                        <div class="pet_infotop">
                                            <h3 class="pet_name">Tommy</h3>
                                            <h4 class="pet_price">Price : $2,998</h4>
                                        </div>
                                    </div>
                                </div>
                                <!-- end pets inform -->
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                <!-- pets inform -->
                                <div class="pet_info margin_top_30">
                                    <div class="pet_img">
                                        <img class="img-responsive" src="../images/pt2.png" alt="#" />
                                        <div class="overview_search"><a href="pet_details.html"><i class="fa fa-search"></i></a></div>
                                    </div>
                                    <div class="petinfo">
                                        <div class="pet_infotop">
                                            <h3 class="pet_name">Charlie</h3>
                                            <h4 class="pet_price">Price : $2,998</h4>
                                        </div>
                                    </div>
                                </div>
                                <!-- end pets inform -->
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                <!-- pets inform -->
                                <div class="pet_info margin_top_30">
                                    <div class="pet_img">
                                        <img class="img-responsive" src="../images/pt3.png" alt="#" />
                                        <div class="overview_search"><a href="pet_details.html"><i class="fa fa-search"></i></a></div>
                                    </div>
                                    <div class="petinfo">
                                        <div class="pet_infotop">
                                            <h3 class="pet_name">Flummy</h3>
                                            <h4 class="pet_price">Price : $2,998</h4>
                                        </div>
                                    </div>
                                </div>
                                <!-- end pets inform -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-1 col-md-12"></div>
            </div>

        </div>
    </section>
</x-app-layout>


