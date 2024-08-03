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
        Schema::create('dogs', function (Blueprint $table) {
            $table->id();
            $table->string('dog_name');
            $table->string('dog_slug');
            $table->enum('dog_type', ['adult', 'puppy']);
            $table->string('dog_breed');
            $table->integer('dog_age');
            $table->enum('dog_gender', ['male', 'female']);
            $table->integer('dog_weight');
            $table->integer('dog_price');
            $table->string('dog_image', 2000)->nullable();
            $table->string('dog_image_mime')->nullable();
            $table->integer('dog_image_size')->nullable();
            $table->string('dog_size')->nullable();
            $table->string('dog_color')->nullable();
            $table->longText('dog_description')->nullable();
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
        Schema::dropIfExists('dogs');
    }
};
