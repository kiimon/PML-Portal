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
        Schema::table('team_captains', function (Blueprint $table) {
            $table->string('ml_id')->nullable();
            $table->string('server')->nullable();
            $table->string('ml_username')->nullable();
            $table->string('role')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('team_captains', function (Blueprint $table) {
            $table->dropColumn(['ml_id', 'server', 'ml_username', 'role']);
        });
    }
};
