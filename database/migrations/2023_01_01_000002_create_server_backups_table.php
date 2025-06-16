<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('server_backups', function (Blueprint $table) {
            $table->id();
            $table->foreignId('server_id')->constrained('servers');
            $table->string('backup_type');
            $table->foreignId('backup_server_id')->constrained('clients_servers');
            $table->string('username');
            $table->string('password');
            $table->unsignedTinyInteger('schedule_day')->nullable();
            $table->unsignedTinyInteger('schedule_hour')->nullable();
            $table->string('timezone')->default('UTC');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('server_backups');
    }
};
