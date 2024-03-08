<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// Models
use App\Models\Tag;

// Requests
use App\Http\Requests\Tag\StoreRequest as TagStoreRequest;
use App\Http\Requests\Tag\UpdateRequest as TagUpdateRequest;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tags = Tag::all();

        return view('admin.tags.index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.tags.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TagStoreRequest $request)
    {
        $tagData = $request->validated();

        $slug = str()->slug($tagData['title']);

        $tag = Tag::create([
            'title' => $tagData['title'],
            'slug' => $slug,
        ]);

        return redirect()->route('admin.tags.show', ['tag' => $tag->id]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Tag $tag)
    {
        return view('admin.tags.show', compact('tag'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tag $tag)
    {
        return view('admin.tags.edit', compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TagUpdateRequest $request, Tag $tag)
    {
        $tagData = $request->validated();

        $slug = str()->slug($tagData['title']);

        $tag->update([
            'title' => $tagData['title'],
            'slug' => $slug,
        ]);

        return redirect()->route('admin.tags.show', ['tag' => $tag->id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tag $tag)
    {
        $tag->delete();

        return redirect()->route('admin.tags.index');
    }
}
