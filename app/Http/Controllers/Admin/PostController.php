<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// Models
use App\Models\Post;

// Helpers
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();

        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $postData = $request->validate([
        //     'title' => 'required',
        //     'content' => 'required',
        // ]);

        $postData = $request->all();

        $slug = Str::slug($postData['title']);

        // $existingPostWithThisSlug = Post::where('slug', $slug)->first();

        // // Se entra qui, vuol dire che non ha trovato un post con questo slug
        // if ($existingPostWithThisSlug != null) {
        //     // Genera un nuovo slug
        // }

        $post = Post::create([
            'title' => $postData['title'],
            'slug' => $slug,
            'content' => $postData['content'],
        ]);

        return redirect()->route('admin.posts.show', compact('post'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('admin.posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        // $postData = $request->validate([
        //     'title' => 'required',
        //     'content' => 'required',
        // ]);

        $postData = $request->all();

        $slug = Str::slug($postData['title']);

        // $existingPostWithThisSlug = Post::where('slug', $slug)->first();

        // // Se entra qui, vuol dire che non ha trovato un post con questo slug
        // if ($existingPostWithThisSlug != null) {
        //     // Genera un nuovo slug
        // }

        $post->update($postData);

        return redirect()->route('admin.posts.show', compact('post'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('admin.posts.index');
    }
}
