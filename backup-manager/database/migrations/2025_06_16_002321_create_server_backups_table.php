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
            $table->foreignId('server_id')->constrained()->cascadeOnDelete();
            $table->foreignId('backup_server_id')->constrained('backup_servers')->cascadeOnDelete();
            $table->enum('backup_type', ['full', 'incremental', 'db', 'nas']);
            $table->unsignedTinyInteger('schedule_hour');
            $table->unsignedTinyInteger('day_of_week')->nullable();
            $table->timestamps();

            $table->unique(['server_id','backup_server_id','backup_type','schedule_hour','day_of_week'], 'unique_schedule');
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
