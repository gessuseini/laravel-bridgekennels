<x-app-layout>
    <!-- inner page banner -->
    <section class="innerpage_banner">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="full">
                        <div class="page_title">
                            <div class="full heading_s1">
                                <h2><span>Our dogs</span></h2>
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
                        <h2><img src="images/icon_head.png" alt="#"><br><span>Our latest puppies</span></h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="readmore_bt center margin_top_20 grid grid-cols-3 gap-4">
                        <a id="allDogsBtn"
                           class="main_bt filter-puppies bg-gray-700 hover:bg-blue-500 text-gray-700 hover:text-white mr-3 active"
                           href="#" data-gender="all">All Puppies</a>
                        <a id="maleDogsBtn"
                           class="main_bt filter-puppies bg-gray-700 hover:bg-blue-500 text-gray-700 hover:text-white mr-3"
                           href="#" data-gender="male">Male Puppies</a>
                        <a id="femaleDogsBtn"
                           class="main_bt read_more_bt filter-puppies bg-gray-700 hover:bg-blue-500 text-gray-700 hover:text-white"
                           href="#" data-gender="female">Female Puppies</a>
                    </div>
                </div>
            </div>

            <div class="row dogs-list">
                <!-- Dogs list will be dynamically loaded here -->
                @include('puppy.puppies-list')
            </div>
        </div>
    </section>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            // Set "All Dogs" button as active by default
            $('#allDogsBtn').addClass('active');

            $('.filter-puppies').click(function (e) {
                var gender = $(this).data('gender');
                e.preventDefault();

                // Add active class and disable the button
                $(this).addClass("active");
                $('.filter-puppies').not(this).removeClass("active");

                $.ajax({
                    url: '/filter-puppies',
                    type: 'GET',
                    data: {gender: gender},
                    success: function (response) {
                        $('.dogs-list').html(response); // Assuming .dogs-list is your dogs list container
                    },
                    error: function (xhr, status, error) {
                        console.error('Error fetching dogs:', error);
                    }
                });
            });
        });
    </script>


</x-app-layout>

<style>
    /* Add style for the active state */
    .active {
        background-color: #111428; /* Active background color */
        color: #ffffff !important; /* Active text color */
    }
</style>
