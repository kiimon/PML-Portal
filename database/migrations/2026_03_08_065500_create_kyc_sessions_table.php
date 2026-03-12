<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('kyc_sessions', function (Blueprint $table) {

            $table->id();

            $table->uuid('token');

            $table->string('status')->default('pending');

            $table->json('ocr_data')->nullable();

            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kyc_sessions');
    }
};