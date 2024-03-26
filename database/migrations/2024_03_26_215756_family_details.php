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
        Schema::create('family_details', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('ip_address',30);
            $table->string('father_name',70);
            $table->string('mother_name',70);
            $table->string('grand_father_name',70)->nullable();
            $table->string('grand_mother_name',70)->nullable();
            $table->string('uncle_name')->nullable();
            $table->string('aunty_name')->nullable();
            $table->string('brother_name')->nullable();
            $table->string('sister_name')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('family_details');
    }
};
