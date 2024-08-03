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
    <section class="layout_padding white_bg request_dog_section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="full heading_s2 text_align_center margin_bottom_50">
                        <h2><span>Request Dog</span></h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <form action="{{ route('send-request') }}" method="POST">
                        @csrf
                        <input type="hidden" name="dog_id" value="{{ $dog->id }}">
                        <div class="form-group">
                            <label for="dog_name">Dog Name</label>
                            <input type="text" id="dog_name" name="dog_name" class="form-control" value="{{ $dog->dog_name }}" disabled>
                        </div>
                        <div class="form-group">
                            <label for="client_name">Your Name</label>
                            <input type="text" id="client_name" name="client_name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="client_surname">Your Surname</label>
                            <input type="text" id="client_surname" name="client_surname" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="client_email">Your Email</label>
                            <input type="email" id="client_email" name="client_email" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="client_phone">Your Phone Number</label>
                            <input type="text" id="client_phone" name="client_phone" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea id="description" name="description" class="form-control" rows="4" required></textarea>
                        </div>
                        <div class="form-group text_align_center">
                            <button type="submit" class="main_bt">Request</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
