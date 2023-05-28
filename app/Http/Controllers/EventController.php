<?php

namespace App\Http\Controllers;

use App\Http\Requests\EventRequest;
use App\Models\Event;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Province;
use App\Models\City;


class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $events = Event::all();
        $categories = Category::all();
        $provinces = Province::all();

        //filter by category, province and city

        if ($request->has('category') && $request->category != 0) {
            $events = $events->where('category_id', $request->category);
        }

        if ($request->has('province') && $request->province != 0) {
            $events = $events->where('province_id', $request->province);
        }

        if ($request->has('city') && $request->city != 0) {
            $events = $events->where('city_id', $request->city);
        }


        return view('events', compact('events', 'categories', 'provinces'));
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
    public function store(EventRequest $request)
    {
        $imageName = time().$request->image->getClientOriginalName();
        

        $event = Event::create([
            'name' => $request->name,
            'description' => $request->description,
            'address' => $request->address,
            'category_id' => $request->category,
            'province_id' => $request->province,
            'city_id' => $request->city,
            'max_participants' => $request->max_participants,
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

    public function subscribe(string $id)
    {
        $event = Event::find($id);
        $event->participants()->attach(auth()->user()->id);

        return redirect()->back();
    }

    public function unsubscribe(string $id)
    {
        $event = Event::find($id);
        $event->participants()->detach(auth()->user()->id);

        return redirect()->back();
    }
}
