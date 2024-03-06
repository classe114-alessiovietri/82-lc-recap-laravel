<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// Models
use App\Models\Post;

// Helpers
use Illuminate\Support\Str;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Post::truncate();

        // OPPURE

        // $allPosts = Post::all();
        // foreach ($allPosts as $singlePost) {
        //     $singlePost->delete();
        // }

        for ($i = 0; $i < 10; $i++) {
            $title = fake()->sentence();
            // Abbiamo impostato lo slug come UNIQUE, quindi, per pulizia, andrebbe controllato se esiste già quello slug
            // nel DB, ma qui stiamo dando per scontato che ci genererà tutti titoli diversi (e quindi, anche slug diversi)
            $slug = Str::slug($title);


            // $post = new Post();
            // $post->title = $title;
            // $post->slug = $slug;
            // $post->content = fake()->paragraph();
            // $post->save();

            // OPPURE

            $post = Post::create([
                'title' => $title,
                'slug' => $slug,
                'content' => fake()->paragraph(),
            ]);

            // OPPURE

            // $post = new Post();
            // $post->fill([
            //     'title' => $title,
            //     'slug' => $slug,
            //     'content' => fake()->paragraph(),
            // ]);
            // $post->save();
        }
    }
}
