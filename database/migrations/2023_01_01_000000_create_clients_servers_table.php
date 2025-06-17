<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('clients_servers', function (Blueprint $table) {
            $table->id();
            $table->string('hostname');
            $table->string('ip_address');
            $table->string('dns')->nullable();
            $table->string('server_type');
            $table->string('vnc_user')->nullable();
            $table->string('vnc_password')->nullable();
            $table->string('control_panel')->nullable();
            $table->unsignedBigInteger('license_group_id')->nullable();
            $table->unsignedBigInteger('license_id')->nullable();
            $table->string('disk_space')->nullable();
            $table->string('connection_speed')->nullable();
            $table->string('timezone')->default('UTC');
            $table->boolean('internal_backup_enabled')->default(false);
            $table->time('internal_backup_schedule')->nullable();
            $table->boolean('external_backup_compressed')->default(false);
            $table->time('external_backup_schedule')->nullable();
            $table->unsignedBigInteger('full_backup_server_id')->nullable();
            $table->string('full_backup_username')->nullable();
            $table->string('full_backup_password')->nullable();
            $table->unsignedBigInteger('incremental_backup_server_id')->nullable();
            $table->time('incremental_backup_schedule')->nullable();
            $table->unsignedBigInteger('db_backup_server_id')->nullable();
            $table->time('db_backup_schedule')->nullable();
            $table->time('nas_sync_schedule')->nullable();
            $table->string('nas_username')->nullable();
            $table->string('nas_password')->nullable();
            $table->string('backup_system_type')->nullable();
            $table->string('backup_system_version')->nullable();
            $table->string('secret_code')->nullable();
            $table->string('node_group')->nullable();
            $table->string('datacenter')->nullable();
            $table->string('client_number')->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('clients_servers');
    }
};
