<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        //$user = Auth::user();
        //$events = $user->getTasks;
        //$events = Event::orderBy("id")->get();
        $events = Event::where('user_id',Auth::user()->id)->latest('updated_at')->paginate(10);

        return view('panel.events.index',compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('panel.events.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        //dd($request);
        $event = new Event();


        $event -> user_id = Auth::user()->id;

        $event->name = $request->name;
        $event->description = $request->description;
        $event->event_date = $request->event_date;
        if ($request->hasFile("photo")) {
            $path = public_path("Events/Photos");
            $name = Str::random(10);
            $file = $request->file("photo");
            $name = $name . $file->getClientOriginalName();
            $file->move($path, $name);
            $event->photo = $name;
        }
        $event->save();
        return redirect()->route("panel.event.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $event = Event::where("id", $id)->first();
        return view("panel.events.show", compact("event"));
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
        $event = Event::find($id);
        if (isset($event)) {
            $event->delete();

        }
        return redirect()->route("panel.event.index");
    }
}
