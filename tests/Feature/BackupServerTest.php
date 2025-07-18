<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\BackupServer;
use App\Models\User;

class BackupServerTest extends TestCase
{
    use RefreshDatabase;

    public function test_index_displays_backup_servers(): void
    {
        BackupServer::factory()->create(['hostname' => 'server1']);

        $this->actingAs(User::factory()->create());
        $response = $this->get('/backupservers');

        $response->assertStatus(200);
        $response->assertSee('server1');
    }

    public function test_server_can_be_created_and_updated_and_deleted(): void
    {
        $this->actingAs(User::factory()->create());
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

    public function test_non_admin_role_is_denied_access(): void
    {
        $this->actingAs(User::factory()->viewer()->create());

        $this->get('/backupservers')->assertStatus(403);
    }
}
