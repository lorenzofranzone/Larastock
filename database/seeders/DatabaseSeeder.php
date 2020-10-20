<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
// use Database\Seeders\UserSeeder;
// use Database\Seeders\AlbumSeeder;
// use Database\Seeders\PhotoSeeder;
use App\Models\User;
use App\Models\Album;
use App\Models\Photo;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        
        // Metodo 1
        // $this->call(UserSeeder::class);
        // $this->call(AlbumSeeder::class);
        // $this->call(PhotoSeeder::class);

        // Metodo 2 (factory)
        User::factory(10)->has(
            Album::factory(4)->has(
                Photo::factory(20)
            )
        )->create();

    }
}
