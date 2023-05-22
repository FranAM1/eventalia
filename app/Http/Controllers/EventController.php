<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Province;


class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::all();

        return view('events', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $provinces = Province::all();

        return view('createEvent', compact('categories', 'provinces'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'address' => 'required|string',
            'category' => 'required|integer',
            'province' => 'required|integer',
            'city' => 'required|integer',
            'start_date' => 'required|date|after:today|before:end_date',
            'end_date' => 'required|date|after:start_date',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $imageName = time().$request->image->getClientOriginalName();
        

        $event = Event::create([
            'name' => $request->name,
            'description' => $request->description,
            'address' => $request->address,
            'category_id' => $request->category,
            'province_id' => $request->province,
            'city_id' => $request->city,
            'user_id' => auth()->user()->id,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'image' => $imageName,
        ]);

        $event->save();

        $request->image->move(public_path('images/events'), $imageName);

        return redirect()->back();   
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $event = Event::find($id);
        $comments = $event->comments;

        return view('showEvent', compact('event', 'comments'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
