@foreach($dogs as $dog)
    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
        <!-- pets inform -->
        <div class="pet_info">
            <div class="pet_img">
                <img class="img-responsive" src="{{ $dog->dog_image }}" alt="#" />
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
        <!-- end pets inform -->
    </div>
@endforeach

