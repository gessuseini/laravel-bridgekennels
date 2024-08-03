<?php

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
        Schema::create('team_members', function (Blueprint $table) {
            $table->id();
            $table->string('member_name');
            $table->string('member_image', 2000)->nullable();
            $table->string('member_image_mime')->nullable();
            $table->integer('member_image_size')->nullable();
            $table->string('member_role');
            $table->string('member_facebook')->nullable();
            $table->string('member_twitter')->nullable();
            $table->string('member_linkedin')->nullable();
            $table->string('member_google_plus')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('team_members');
    }
};
