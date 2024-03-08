<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// Models
use App\Models\Tag;

// Helpers
use Illuminate\Support\Facades\Schema;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::withoutForeignKeyConstraints(function () {
            Tag::truncate();
        });

        $allTags = [
            'News',
            'Updates',
            'Release',
            'Technology',
            'Web',
            'Software',
            'Hardware',
            'Blockchain',
            'AI',
            'Machine Learning',
            'ChatGPT',
        ];

        foreach ($allTags as $singleTag) {
            $tag = Tag::create([
                'title' => $singleTag,
                'slug' => str()->slug($singleTag),
            ]);
        }
    }
}
