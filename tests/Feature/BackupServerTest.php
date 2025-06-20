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
}
