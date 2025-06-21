<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\License;

class LicenseFactory extends Factory
{
    protected $model = License::class;

    public function definition(): array
    {
        return [
            'key' => $this->faker->uuid,
            'group' => 'default',
            'type' => 'trial',
            'active' => true,
        ];
    }
}
