<?php

namespace Database\Factories;

use App\Models\Guru;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Guru>
 */
class GuruFactory extends Factory
{
    protected $model = Guru::class;

    public function definition(): array
    {
        return [
            'nip' => fake()->unique()->numerify('##################'),
            'nama_guru' => fake()->name(),

            'mapel' => fake()->randomElement([
                'Basis Data',
                'Pemrograman',
                'Matematika',
                'Bahasa Indonesia',
            ]),

            'foto' => null,
            'deskripsi' => fake()->sentence(),
        ];
    }
}