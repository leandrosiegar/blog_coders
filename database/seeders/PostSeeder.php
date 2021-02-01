<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\Image;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $posts = Post::factory(100)->create();
        foreach ($posts as $post) {
            Image::factory(1)->create(
                [
                    'imageable_id' => $post->id,
                    'imageable_type' => Post::class
                ]
            );

            // add tb valores al azar en la tabla intermedia de muchos a muchos entre tags y posts
            // attach parametros son: post_id y tag_id segun definimos antes
            $post->tags()->attach([
                rand(1,4),
                rand(5,8)
            ]);
        }


    }
}
