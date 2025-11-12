<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Berita;
use App\Models\Kategori;
use App\Models\Wartawan;
use App\Models\Komentar;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::firstOrCreate(
        //     ['email' => 'test@example.com'],
        //     [
        //         'name' => 'Test User',
        //         'password' => 'password',
        //         'email_verified_at' => now(),
        //     ]
        // );
        $kategoriList = ['Science', 'Sports', 'Technology', 'Health'];

        foreach ($kategoriList as $nama) {
            Kategori::firstOrCreate(['nama_kategori' => $nama]);
        }


        $wartawans = Wartawan::factory(4)->create();
        $kategori = Kategori::all();

        foreach ($wartawans as $wartawan) {
            Berita::factory(8)->create([
                'wartawan_id' => $wartawan->id,
                'kategori_id' => $kategori->random()->id
            ]);
        }

        $beritas = Berita::all();
        foreach ($beritas as $berita) {
            Komentar::factory(5)->create([
                'berita_id' => $berita->id
            ]);
        }


    }
}
