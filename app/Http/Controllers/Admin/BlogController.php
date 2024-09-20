<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blog::orderBy('date', 'desc')->get();
        return view('backend.blog.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.blog.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'type' => 'required',
            'date' => 'required',
            'description' => 'required',
            'image' => 'required|file|max:8192'
        ]);

        $validatedData['slug'] = Str::slug($request->input('title'), '-');
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $originalName = str_replace(' ', '_', $image->getClientOriginalName());
            $imageName =  time()  . '_' . $originalName;
            $image->storeAs('blog_images', $imageName, 'public');
            $validatedData['image'] = $imageName;
        }

        Blog::create($validatedData);

        return redirect()->route('blog.index')->with('success', 'Blog added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $blog = Blog::findOrFail($id);
        return view('backend.blog.edit', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'type' => 'required',
            'date' => 'required',
            'description' => 'required',
            'active' => 'required',
            'image' => 'nullable|file|max:8192'
        ]);

        $validatedData['slug'] = Str::slug($request->input('title'), '-');
        $blog = Blog::find($id);
        $validatedData['image'] = $blog->image;

        if ($request->hasFile('image')) {
            if ($blog->image && file_exists('storage/blog_images/' . $blog->image)) {
                unlink('storage/blog_images/' . $blog->image);
            }
            $image = $request->file('image');
            $originalName = str_replace(' ', '_', $image->getClientOriginalName());
            $imageName =  time()  . '_' . $originalName;
            $image->storeAs('blog_images', $imageName, 'public');
            $validatedData['image'] = $imageName;
        }

        $blog->update($validatedData);

        return redirect()->route('blog.index')->with('success', 'Blog updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $blog = Blog::findOrFail($id);
        if ($blog->image && file_exists('storage/blog_images/' . $blog->image)) {
            unlink('storage/blog_images/' . $blog->image);
        }
        $blog->delete();
        return redirect()->back()->with('success', 'Blog deleted successfully');
    }
}
