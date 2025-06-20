<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\BackupServer;

class BackupServerTest extends TestCase
{
    use RefreshDatabase;

    public function test_index_displays_backup_servers(): void
    {
        BackupServer::factory()->create(['hostname' => 'server1']);

        $response = $this->get('/backupservers');

        $response->assertStatus(200);
        $response->assertSee('server1');
    }

    public function test_server_can_be_created_and_updated_and_deleted(): void
    {
        $response = $this->post('/backupservers', [
            'hostname' => 'srv',
            'ip_address' => '1.1.1.1',
            'timezone' => 'UTC',
        ]);
        $response->assertRedirect('/backupservers');

        $server = BackupServer::first();
        $this->put("/backupservers/{$server->id}", [
            'hostname' => 'srv2',
            'ip_address' => '1.1.1.1',
            'timezone' => 'UTC',
        ])->assertRedirect('/backupservers');

        $this->delete("/backupservers/{$server->id}")->assertRedirect('/backupservers');

        $this->assertDatabaseMissing('backup_servers', ['id' => $server->id]);
    }
}
