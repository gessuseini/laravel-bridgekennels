@foreach($dogs as $dog)
    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
        <!-- pets inform -->
        <a style="text-decoration: none; align-content: center;" href=" {{ route('dog.view', $dog->dog_slug) }} ">
        <div class="pet_info">
            <div class="pet_imgs">
                <img class="img-responsive" src="{{ $dog->dog_image }}" alt="#" />
            </div>
            <div class="petinfo">
                <div class="pet_infotop">
                    <h3>{{ $dog->dog_name }}</h3>
                </div>
                <div class="pet_infobottom">
                    <ul>
                        <li>Price: ${{ $dog->dog_price }}</li>
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
