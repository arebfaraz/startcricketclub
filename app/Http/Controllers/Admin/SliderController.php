<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sliders = Slider::all();
        return view('backend.slider.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.slider.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|file|max:8192'
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $originalName = str_replace(' ', '_', $image->getClientOriginalName());
            $imageName =  time()  . '_' . $originalName;
            $image->storeAs('slider_images', $imageName, 'public');
            $validatedData['image'] = $imageName;
        }

        Slider::create($validatedData);

        return redirect()->route('slider.index')->with('success', 'Slider added successfully');
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
        $slider = Slider::find($id);
        if ($slider) {
            return view('backend.slider.edit', compact('slider'));
        }
        return redirect()->route('slider.index')->with('error', 'Slider not found');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'nullable|file|max:8192'
        ]);

        $slider = Slider::find($id);

        if ($request->hasFile('image')) {
            if ($slider->image && file_exists('storage/slider_images/' . $slider->image)) {
                unlink('storage/slider_images/' . $slider->image);
            }
            $image = $request->file('image');
            $originalName = str_replace(' ', '_', $image->getClientOriginalName());
            $imageName =  time()  . '_' . $originalName;
            $image->storeAs('slider_images', $imageName, 'public');
            $validatedData['image'] = $imageName;
        }

        $slider->update($validatedData);

        return redirect()->route('slider.index')->with('success', 'Slider updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $slider = Slider::find($id);
        if ($slider) {
            $slider->delete();
            return redirect()->back()->with('success', 'Slider deleted successfully');
        }
        return redirect()->back()->with('error', 'Slider not found');
    }

    public function saveStream(Request $request)
    {
        Slider::create(
            [
                'title' => 'Stream - ' . date('m-d-Y'),
                'link' => $request->link,
                'is_stream' => '1',
            ]
        );
        return redirect()->route('slider.index')->with('success', 'Stream added successfully');
    }
}
