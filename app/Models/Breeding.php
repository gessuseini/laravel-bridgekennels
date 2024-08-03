<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Breeding extends Model
{
    public $table = "breedings";

    use HasFactory;
    use HasSlug;
    use SoftDeletes;

    protected $fillable = [
        'breeding_male_dog_name',
        'breeding_female_dog_name',
        'breeding_description',
        'breeding_price',
        'breeding_male_dog_image',
        'breeding_male_dog_image_mime',
        'breeding_male_dog_image_size',
        'breeding_female_dog_image',
        'breeding_female_dog_image_mime',
        'breeding_female_dog_image_size',
        'created_by',
        'updated_by',
    ];

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom(['breeding_male_dog_name', 'breeding_female_dog_name', 'breeding_price'])
            ->saveSlugsTo('breeding_slug');
    }

    public function getRouteKeyName()
    {
        return 'breeding_slug';
    }

}
