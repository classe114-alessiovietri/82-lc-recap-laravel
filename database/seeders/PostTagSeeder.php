<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// Models
use App\Models\Post;
use App\Models\Tag;

class PostTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $posts = Post::all();

        foreach ($posts as $post) {
            $tags = Tag::inRandomOrder()->limit(rand(0, 3))->get();

            foreach ($tags as $tag) {
                $post->tags()->attach($tag->id);
            }
        }
    }
}
