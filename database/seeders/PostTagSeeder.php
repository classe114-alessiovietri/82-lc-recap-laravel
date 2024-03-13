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
            $tags = Tag::inRandomOrder()->get();

            $counter = 0;
            $maxTags = rand(0, 3);
            foreach ($tags as $tag) {
                if ($counter < $maxTags) {
                    $post->tags()->attach($tag->id);
                    $counter++;
                }
                else {
                    break;
                }
            }
        }
    }
}
