<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pegawai>
 */
class PegawaiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama' => $this->faker->name(),
            'posisi' => $this->faker->randomElement(['Kasir', 'Koki', 'Pelayan']),
            'alamat' => $this->faker->address(),
            'no_telpon' => $this->faker->phoneNumber(),
        ];
    }
}