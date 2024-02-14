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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('driver_R_id');
            $table->unsignedBigInteger('passager_id');
            $table->integer('rating');
            $table->text('comment')->nullable();
            $table->timestamps();
        
            $table->foreign('driver_R_id')->references('id')->on('drivers');
            $table->foreign('passager_id')->references('user_id')->on('users');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
