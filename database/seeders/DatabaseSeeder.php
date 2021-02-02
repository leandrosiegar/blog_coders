<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;

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

        // crear la carpeta posts pq por defecto no está creada
        Storage::deleteDirectory('posts');
        Storage::makeDirectory('posts'); // te la crea en public\storage

        $this->call(UserSeeder::class);
        Category::factory(4)->create();
        Tag::factory(8)->create();
        // Post::factory(100)->create();
        $this->call(PostSeeder::class);
    }
}
