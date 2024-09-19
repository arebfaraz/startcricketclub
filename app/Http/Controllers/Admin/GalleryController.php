<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $galleries = Gallery::all();
        return view('backend.gallery.index', compact('galleries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.gallery.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'gallery' => 'required|array',
        ]);

        if ($request->hasFile('gallery')) {
            foreach ($request->file('gallery') as $key => $image) {
                if ($image) {
                    // Generate a unique name for each image
                    $imageName =  time() . '_' . $key . '_' . $image->getClientOriginalName();
                    $image->storeAs('galleries', $imageName, 'public');

                    Gallery::create([
                        'image' => $imageName,
                    ]);
                }
            }
        }


        return redirect()->route('gallery.index')->with('success', 'Gallery added successfully');
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
        $gallery = Gallery::findOrFail($id);
        return view('backend.gallery.edit', compact('gallery'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $gallery = Gallery::find($id);

        if ($request->hasFile('gallery')) {
            if ($gallery->image && file_exists('storage/galleries/' . $gallery->image)) {
                unlink('storage/galleries/' . $gallery->image);
            }
            $image = $request->file('gallery');
            $originalName = str_replace(' ', '_', $image->getClientOriginalName());
            $imageName =  time()  . '_' . $originalName;
            $image->storeAs('galleries', $imageName, 'public');
            $validatedData['image'] = $imageName;
            $gallery->update($validatedData);
        }


        return redirect()->route('gallery.index')->with('success', 'Gallery updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $gallery = Gallery::findOrFail($id);
        if ($gallery->image && file_exists('storage/galleries/' . $gallery->image)) {
            unlink('storage/galleries/' . $gallery->image);
        }

        $gallery->delete();
        return redirect()->back()->with('success', 'Gallery deleted successfully');
    }
}
