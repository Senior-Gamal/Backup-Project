<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\ClientServer;

class ClientServerFactory extends Factory
{
    protected $model = ClientServer::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->domainName,
            'ip_address' => $this->faker->ipv4,
            'status' => 'active',
        ];
    }
}
