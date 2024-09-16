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
        Schema::create('isic_comments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('isic_id');
            $table->string('fullname');
            $table->string('mobile');
            $table->text('comment');
            $table->timestamps();
            $table->foreign('isic_id')->references('id')->on('isics');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('isic_comments');
    }
};
