<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('breedings', function (Blueprint $table) {
            $table->id();
            $table->string('breeding_slug');
            $table->string('breeding_male_dog_name');
            $table->string('breeding_female_dog_name');
            $table->string('breeding_description');
            $table->integer('breeding_price');
            $table->string('breeding_male_dog_image', 2000)->nullable();
            $table->string('breeding_male_dog_image_mime')->nullable();
            $table->integer('breeding_male_dog_image_size')->nullable();
            $table->string('breeding_female_dog_image', 2000)->nullable();
            $table->string('breeding_female_dog_image_mime')->nullable();
            $table->integer('breeding_female_dog_image_size')->nullable();
            $table->foreignIdFor(User::class, 'created_by')->nullable();
            $table->foreignIdFor(User::class, 'updated_by')->nullable();
            $table->foreignIdFor(User::class, 'deleted_by')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('breedings');
    }
};
