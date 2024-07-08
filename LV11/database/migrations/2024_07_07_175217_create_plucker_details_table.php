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
        Schema::create('plucker_details', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('farm')->nullable();
            $table->string('phone')->nullable();
            $table->string('weight_collected')->nullable();
            $table->enum('role',['agent','user'])->default('user');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plucker_details');
    }
};
