<?php

namespace Database\Seeders;

use App\Models\Film;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        User::factory()->create(['email' => 'admin@example.com', 'is_admin' => 1]);
        User::factory()->create(['email' => 'user@example.com']);
        
        $path = storage_path() . "/app/top-rated-movies-01.json";
        $json = json_decode(file_get_contents($path)); 
        foreach($json as $item) {
            Film::create([
                'titre' => !empty($item->originalTitle) ? $item->originalTitle : $item->title,
                'genre' => implode(', ', $item->genres)
            ]);
        }
    }
}
