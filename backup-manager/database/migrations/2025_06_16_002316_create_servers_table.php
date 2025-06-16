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
        Schema::create('servers', function (Blueprint $table) {
            $table->id();
            $table->string('hostname');
            $table->string('ip');
            $table->string('dns')->nullable();
            $table->string('vnc')->nullable();
            $table->string('control_panel')->nullable();
            $table->time('backup_time')->nullable();
            $table->string('username')->nullable();
            $table->string('password')->nullable();
            $table->string('license_reference')->nullable();
            $table->string('node_group')->nullable();
            $table->string('data_center')->nullable();
            $table->string('timezone')->default('UTC');
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('servers');
    }
};
