<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Dog extends Model
{
    public $table = "dogs";

    use HasFactory;
    use HasSlug;
    use SoftDeletes;

    protected $fillable = ['dog_name', 'dog_type', 'dog_breed', 'dog_age', 'dog_gender', 'dog_weight', 'dog_size', 'dog_color', 'dog_image', 'dog_description', 'dog_price', 'dog_image_mime', 'dog_image_size', 'created_by', 'updated_by'];

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom(['dog_name', 'dog_breed', 'dog_age'])
            ->saveSlugsTo('dog_slug');
    }

    public function getRouteKeyName()
    {
        return 'dog_slug';
    }
}
