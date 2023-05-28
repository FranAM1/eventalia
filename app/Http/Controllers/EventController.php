<?php

namespace App\Http\Controllers;

use App\Http\Requests\EventRequest;
use App\Models\Event;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Province;
use App\Models\City;
use Carbon\Carbon;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $currentDate = Carbon::now();
        $events = Event::all()->sortByDesc('start_date');
        
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
        if($request->hasFile('image')){
            $imageName = time().$request->image->getClientOriginalName();
        }
        else{
            $imageName = 'default.jpg';
        }
        
        

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

        if($request->hasFile('image')){
            $request->image->move(public_path('images/events'), $imageName);
        }
        

        return redirect()->back()->with('success', 'Evento creado correctamente ✔');;   
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
        $event = Event::find($id);
        $categories = Category::all();
        $provinces = Province::all();

        return view('editEvent', compact('event', 'categories', 'provinces'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EventRequest $request, string $id)
    {
        $event = Event::find($id);

        if($request->hasFile('image')){
            $imageName = time().$request->image->getClientOriginalName();
        }else{
            $imageName = $event->image;
        }
        

        $event->update([
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

        if($request->hasFile('image')){
            $request->image->move(public_path('images/events'), $imageName);
        }

        return redirect()->back()->with('success', 'Evento editado correctamente ✔');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $event = Event::find($id);
        $event->delete();

        return redirect()->route('event.index')->with('success', 'Evento eliminado correctamente ✔');
    }

    public function subscribe(string $id)
    {
        $event = Event::find($id);

        if($event->isActive() || $event->isFull() || $event->isFinished()){
            return redirect()->back();
        }

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
