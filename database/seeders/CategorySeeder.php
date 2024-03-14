<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// Models
use App\Models\Category;

// Helpers
use Illuminate\Support\Facades\Schema;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $allCategories = Category::all();
        foreach ($allCategories as $singleCategory) {
            $singleCategory->delete();
        }

        $allCategories = [
            'HTML',
            'CSS',
            'JavaScript',
            'Vue',
            'SQL',
            'PHP',
            'Laravel'
        ];

        foreach ($allCategories as $singleCategory) {
            $category = Category::create([
                'title' => $singleCategory,
                'slug' => str()->slug($singleCategory),
            ]);
        }
    }
}
