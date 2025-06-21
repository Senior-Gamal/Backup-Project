<?php

namespace Tests\Feature;

use App\Models\BackupServer;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ViewerAccessTest extends TestCase
{
    use RefreshDatabase;

    public function test_viewer_cannot_access_dashboard(): void
    {
        $viewer = User::factory()->create(['email' => 'viewer@example.com']);
        $this->actingAs($viewer);

        $this->get('/dashboard')->assertForbidden();
    }

    public function test_viewer_cannot_access_backupservers_crud(): void
    {
        $viewer = User::factory()->create(['email' => 'viewer@example.com']);
        $this->actingAs($viewer);

        $this->get('/backupservers')->assertForbidden();

        $this->post('/backupservers', [
            'hostname' => 'srv',
            'ip_address' => '1.1.1.1',
            'timezone' => 'UTC',
        ])->assertForbidden();
    }
}
