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
        Schema::create('namayeshgah', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('pr_phone')->nullable();
            $table->string('address')->nullable();
            $table->string('start_date')->nullable();
            $table->string('end_date')->nullable();
            $table->string('number_of_booth1')->nullable();
            $table->string('meterage_of_booth1')->nullable();
            $table->string('price_of_booth1_per_meter')->nullable();
            $table->string('number_of_booth2')->nullable();
            $table->string('meterage_of_booth2')->nullable();
            $table->string('price_of_booth2_per_meter')->nullable();
            $table->string('number_of_booth3')->nullable();
            $table->string('meterage_of_booth3')->nullable();
            $table->string('price_of_booth3_per_meter')->nullable();
            $table->string('number_of_booth4')->nullable();
            $table->string('meterage_of_booth4')->nullable();
            $table->string('price_of_booth4_per_meter')->nullable();
            $table->string('performancer_name')->nullable();
            $table->string('performancer_lname')->nullable();
            $table->string('performancer_nid')->nullable();
            $table->string('performancer_mobile')->nullable();
            $table->string('price_file')->nullable();
            $table->string('place_checklist_file')->nullable();
            $table->string('booth_checklist_file')->nullable();
            $table->string('performance_checklist_file')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('namayeshgah');
    }
};
