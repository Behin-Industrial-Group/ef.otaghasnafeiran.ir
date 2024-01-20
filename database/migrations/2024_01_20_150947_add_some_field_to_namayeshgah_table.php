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
        Schema::table('namayeshgah', function (Blueprint $table) {
            $table->string('excutive_director_fullname')->nullable();
            $table->string('excutive_director_mobile')->nullable();
            $table->string('pr_fullname')->nullable();
            $table->string('pr_mobile')->nullable();
            $table->string('land_owner_fullname')->nullable();
            $table->string('land_owner_nid')->nullable();
            $table->string('land_owner_mobile')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('namayeshgah', function (Blueprint $table) {
            
        });
    }
};
