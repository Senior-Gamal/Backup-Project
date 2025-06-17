<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('backup_servers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('server_id');
            $table->string('backup_type');
            $table->unsignedBigInteger('backup_server_id');
            $table->string('username')->nullable();
            $table->string('password')->nullable();
            $table->unsignedTinyInteger('schedule_day')->nullable();
            $table->unsignedTinyInteger('schedule_hour')->nullable();
            $table->string('timezone')->default('UTC');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('backup_servers');
    }
};
