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
        Schema::create('isics', function (Blueprint $table) {
            $table->id();
            $table->string('unique_id');
            $table->string('code');
            $table->string('_1');
            $table->string('level1');
            $table->string('level2');
            $table->string('level3');
            $table->string('level4')->nullable();
            $table->string('level5')->nullable();
            $table->string('old_isic_title')->nullable();
            $table->string('old_isic_code')->nullable();
            $table->string('comment')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicle_registrations');
    }
};
