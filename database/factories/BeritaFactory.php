<?php

namespace Database\Factories;

use App\Models\Kategori;
use App\Models\Wartawan;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class BeritaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
       $kategori = Kategori::inRandomOrder()->first();
        $wartawan = Wartawan::inRandomOrder()->first();

        $image = $this->faker->image('storage/app/public/berita', 640, 480, null, false);

        return [
            'judul' => $this->faker->sentence(),
            'ringkasan' => $this->faker->paragraph(),
            'isi' => $this->faker->text(2000),
            'kategori_id' => $kategori->id ?? 1,
            'wartawan_id' => $wartawan->id ?? 1,
            'gambar' => 'berita/' . $image, 
        ];
    }
}
