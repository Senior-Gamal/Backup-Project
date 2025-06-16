<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('servers', function (Blueprint $table) {
            $table->id();
            $table->string('hostname');
            $table->string('ip_address');
            $table->string('dns')->nullable();
            $table->string('vnc_user')->nullable();
            $table->string('vnc_password')->nullable();
            $table->string('control_panel')->nullable();
            $table->foreignId('license_id')->nullable()->constrained('licenses');
            $table->foreignId('license_group_id')->nullable()->constrained('license_groups');
            $table->integer('disk_space')->nullable();
            $table->string('connection_speed')->nullable();
            $table->string('timezone')->default('UTC');
            $table->boolean('internal_backup_enabled')->default(false);
            $table->time('internal_backup_time')->nullable();
            $table->boolean('external_backup_compressed')->default(false);
            $table->time('full_backup_time')->nullable();
            $table->foreignId('external_backup_server')->nullable()->constrained('clients_servers');
            $table->string('external_backup_username')->nullable();
            $table->string('external_backup_password')->nullable();
            $table->time('incremental_time')->nullable();
            $table->foreignId('incremental_backup_server')->nullable()->constrained('clients_servers');
            $table->time('db_backup_time')->nullable();
            $table->foreignId('db_backup_server')->nullable()->constrained('clients_servers');
            $table->time('nas_schedule')->nullable();
            $table->string('nas_user')->nullable();
            $table->string('nas_password')->nullable();
            $table->string('backup_system_type')->nullable();
            $table->string('backup_system_version')->nullable();
            $table->string('backup_secret_code')->nullable();
            $table->string('node_group')->nullable();
            $table->string('datacenter')->nullable();
            $table->string('client_number')->nullable();
            $table->text('notes')->nullable();
            $table->timestamp('last_data_update_at')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('servers');
    }
};
