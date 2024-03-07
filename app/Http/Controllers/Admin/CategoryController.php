<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// Models
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();

        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $categoryData = $request->validate([
            'title' => 'required|string|max:32'
        ]);

        $slug = str()->slug($categoryData['title']);

        $category = Category::create([
            'title' => $categoryData['title'],
            'slug' => $slug,
        ]);

        return redirect()->route('admin.categories.show', ['category' => $category->id]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return view('admin.categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $categoryData = $request->validate([
            'title' => 'required|string|max:32'
        ]);

        $slug = str()->slug($categoryData['title']);

        $category->update([
            'title' => $categoryData['title'],
            'slug' => $slug,
        ]);

        return redirect()->route('admin.categories.show', ['category' => $category->id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('admin.categories.index');
    }
}
