<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// Models
use App\Models\Post;
use App\Models\Category;

// Helpers
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

// Helpers
use Illuminate\Support\Facades\Schema;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Schema::disableForeignKeyConstraints();
        // Post::truncate();
        // Schema::enableForeignKeyConstraints();

        // OPPURE

        $allPosts = Post::all();
        foreach ($allPosts as $singlePost) {
            $singlePost->delete();
        }

        // ----------------------------------------------

        // Cancellazione file cover_img precedenti
        // $oldCoverImages = Storage::disk('public')->files('images');
        // foreach ($oldCoverImages as $oldCoverImage) {
        //     Storage::disk('public')->delete($oldCoverImage);
        // }

        // OPPURE

        Storage::disk('public')->deleteDirectory('images');
        Storage::disk('public')->makeDirectory('images');

        for ($i = 0; $i < 5; $i++) {
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

            $coverImgPath = null;
            if (fake()->boolean()) {
                $coverImgPath = 'images/'.fake()->image(storage_path('/app/public/images'), 300, 300, null, false);
            }

            $post = Post::create([
                'title' => $title,
                'slug' => $slug,
                'content' => fake()->paragraph(),
                'category_id' => $randomCategory->id,
                'cover_img' => $coverImgPath,
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
