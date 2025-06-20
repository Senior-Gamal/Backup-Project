<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\BackupServer;

class BackupServerFactory extends Factory
{
    protected $model = BackupServer::class;

    public function definition(): array
    {
        return [
            'hostname' => $this->faker->domainName,
            'ip_address' => $this->faker->ipv4,
            'dns' => $this->faker->domainName,
            'disk_space' => $this->faker->randomNumber(2).'GB',
            'connection_speed' => $this->faker->randomNumber(2).'Mbps',
            'timezone' => $this->faker->timezone,
            'vnc_user' => $this->faker->userName,
            'control_panel' => 'cPanel',
            'license_group' => 'default',
            'license' => 'trial',
            'internal_backup' => $this->faker->boolean,
            'secret_code' => $this->faker->bothify('code-####'),
            'node_group' => 'default',
            'datacenter' => 'dc1',
            'client_number' => $this->faker->randomNumber(4),
            'last_data_update' => $this->faker->date(),
            'notes' => $this->faker->sentence,
        ];
    }
}
