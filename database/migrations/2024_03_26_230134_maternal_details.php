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
        Schema::create('maternal_details', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('ip_address',30);
            $table->string('mama_name',70)->nullable();
            $table->string('mami_name',70)->nullable();
            $table->string('maternal_address',500);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('maternal_details');
    }
};
