<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Sample data for dogs
        $dogs = [
            [
                'dog_name' => 'Buddy',
                'dog_type' => 'adult',
                'dog_breed' => 'Labrador Retriever',
                'dog_age' => 3,
                'dog_gender' => 'male',
                'dog_weight' => 70,
                'dog_size' => 'large',
                'dog_color' => 'black',
                'dog_image' => '',
                'dog_description' => 'Friendly and energetic.',
                'dog_price' => 500.00,
                'dog_image_mime' => 'image/jpeg',
                'dog_image_size' => 200,
                'created_by' => 1,
                'updated_by' => 1,
                'dog_slug' => Str::slug('Buddy Labrador Retriever 3')
            ],
            [
                'dog_name' => 'Bella',
                'dog_type' => 'puppy',
                'dog_breed' => 'German Shepherd',
                'dog_age' => 5,
                'dog_gender' => 'female',
                'dog_weight' => 60,
                'dog_size' => 'medium',
                'dog_color' => 'brown',
                'dog_image' => '',
                'dog_description' => 'Loyal and protective.',
                'dog_price' => 600.00,
                'dog_image_mime' => 'image/jpeg',
                'dog_image_size' => 220,
                'created_by' => 1,
                'updated_by' => 1,
                'dog_slug' => Str::slug('Bella German Shepherd 5')
            ],
            // Add more sample data as needed
        ];

        // Insert data into the dogs table
        DB::table('dogs')->insert($dogs);
    }
}
