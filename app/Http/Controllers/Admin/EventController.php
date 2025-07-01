<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Registration;


class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
public function index()
{
    $events = \App\Models\Event::with('category')->latest()->get();
    return view('admin.events.index', compact('events'));
}

public function create()
{
    $categories = \App\Models\Category::all();
    return view('admin.events.create', compact('categories'));
}

public function store(Request $request)
{
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'location' => 'required|string|max:255',
        'date' => 'required|date',
        'category_id' => 'required|exists:categories,id',
    ]);

    $validated['created_by'] = auth()->id();

    \App\Models\Event::create($validated);

    return redirect()->route('admin.events.index')->with('success', 'تم إنشاء الفعالية بنجاح');
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    public function edit($id)
{
    $event = \App\Models\Event::findOrFail($id);
    $categories = \App\Models\Category::all();

    return view('admin.events.edit', compact('event', 'categories'));
}

public function update(Request $request, $id)
{
    $event = \App\Models\Event::findOrFail($id);

    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'location' => 'required|string|max:255',
        'date' => 'required|date',
        'category_id' => 'required|exists:categories,id',
    ]);

    $event->update($validated);

    return redirect()->route('admin.events.index')->with('success', 'تم تحديث الفعالية بنجاح');
}

public function showRegistrations($id)
{
    $event = Event::with('registrations.user')->findOrFail($id);
    $registrations = $event->registrations;

    return view('admin.events.registrations', compact('event', 'registrations'));
}
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
