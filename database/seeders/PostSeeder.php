<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// Models
use App\Models\Post;
use App\Models\Category;

// Helpers
use Illuminate\Support\Str;

// Helpers
use Illuminate\Support\Facades\Schema;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        Post::truncate();
        Schema::enableForeignKeyConstraints();

        // OPPURE

        // $allPosts = Post::all();
        // foreach ($allPosts as $singlePost) {
        //     $singlePost->delete();
        // }

        for ($i = 0; $i < 30; $i++) {
            $title = fake()->sentence();
            // Abbiamo impostato lo slug come UNIQUE, quindi, per pulizia, andrebbe controllato se esiste già quello slug
            // nel DB, ma qui stiamo dando per scontato che ci genererà tutti titoli diversi (e quindi, anche slug diversi)
            $slug = Str::slug($title);

            $randomCategory = Category::inRandomOrder()->first();

            // $post = new Post();
            // $post->title = $title;
            // $post->slug = $slug;
            // $post->content = fake()->paragraph();
            // $post->category_id = $randomCategory->id;
            // $post->save();

            // OPPURE

            $post = Post::create([
                'title' => $title,
                'slug' => $slug,
                'content' => fake()->paragraph(),
                'category_id' => $randomCategory->id,
            ]);

            // OPPURE

            // $post = new Post();
            // $post->fill([
            //     'title' => $title,
            //     'slug' => $slug,
            //     'content' => fake()->paragraph(),
            //     'category_id' => $randomCategory->id,
            // ]);
            // $post->save();
        }
    }
}
