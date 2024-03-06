<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Models
use App\Models\Post;

// Helpers
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();

        $stringaSalutaUtente = null;
        if (Auth::check()) {
            $user = Auth::user();
            $stringaSalutaUtente = 'Ciao '.$user->name.'!';
        }

        return view('posts.index', compact('posts', 'stringaSalutaUtente'));
    }

    public function show(string $slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();

        // dd(Str::slug('Ciao pippo, come stai? è bel tempo oggi?'));        // -> ciao-pippo-come-stai-e-bello-tempo-oggi
        return view('posts.show', compact('post'));
    }

    // public function show(string $slug)
    // {
    //     $post = Post::where('slug', $slug)->first();

    //     if (!$post) {
    //         abort(404);
    //     }

    //     // dd(Str::slug('Ciao pippo, come stai? è bel tempo oggi?'));        // -> ciao-pippo-come-stai-e-bello-tempo-oggi
    //     return view('posts.show', compact('post'));
    // }
}
