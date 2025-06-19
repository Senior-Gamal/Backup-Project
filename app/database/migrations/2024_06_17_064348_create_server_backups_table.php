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
        Schema::create('server_backups', function (Blueprint $table) {
            $table->id();
            $table->foreignId('server_id')->constrained('client_servers');
            $table->string('backup_type');
            $table->foreignId('backup_server_id')->constrained('backup_servers');
            $table->string('username')->nullable();
            $table->string('password')->nullable();
            $table->unsignedTinyInteger('schedule_day')->nullable();
            $table->unsignedTinyInteger('schedule_hour')->nullable();
            $table->string('timezone')->default('UTC');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('server_backups');
    }
};
