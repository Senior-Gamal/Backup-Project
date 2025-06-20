<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('backup_servers', function (Blueprint $table) {
            $table->id();
            $table->string('hostname');
            $table->string('ip_address');
            $table->string('dns')->nullable();
            $table->string('disk_space')->nullable();
            $table->string('connection_speed')->nullable();
            $table->string('timezone');
            $table->string('vnc_user')->nullable();
            $table->string('control_panel')->nullable();
            $table->string('license_group')->nullable();
            $table->string('license')->nullable();
            $table->boolean('internal_backup')->default(false);
            $table->string('secret_code')->nullable();
            $table->string('node_group')->nullable();
            $table->string('datacenter')->nullable();
            $table->string('client_number')->nullable();
            $table->date('last_data_update')->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('backup_servers');
    }
};
