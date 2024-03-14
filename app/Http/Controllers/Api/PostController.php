<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Models
use App\Models\Post;

class PostController extends Controller
{

    public function index()
    {
        $posts = Post::with('category', 'tags')->paginate(3);

        return response()->json([
            'success' => true,
            'results' => $posts,
        ]);
    }

    public function show(string $slug)
    {
        $post = Post::with('category', 'tags')
                    ->where('slug', $slug)
                    ->first();

        if ($post != null) {
            return response()->json([
                'success' => true,
                'results' => $post,
            ]);
        }
        else {
            return response()->json([
                'success' => false,
                'results' => null,
            ]);
        }
    }

}
