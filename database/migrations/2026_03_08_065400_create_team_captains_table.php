<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('team_captains', function (Blueprint $table) {

            $table->id();

            $table->foreignId('team_id')
                  ->constrained()
                  ->cascadeOnDelete();

            $table->string('full_name')->nullable();

            $table->date('birthday')->nullable();

            $table->integer('age')->nullable();

            $table->string('address')->nullable();

            $table->string('id_image')->nullable();

            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('team_captains');
    }
};