<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Venue;
use App\Models\VenueSection;

class VenueController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $venues = Venue::with('sections', 'concerts')->get();

    return view('admin.venues.index', compact('venues'));
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    $validated = $request->validate([
      'name' => 'required|string|max:255',
      'location' => 'required|string|max:255',
      'capacity' => 'required|integer|min:1',
    ]);

    Venue::create($validated);

    return redirect()->route('admin.venues.index')->with('success', 'Venue created successfully.');
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, string $id)
  {
    $venue = Venue::findOrFail($id);
    $validated = $request->validate([
      'name' => 'required|string|max:255',
      'location' => 'required|string|max:255',
      'capacity' => 'required|integer|min:1',
    ]);

    $venue->update($validated);

    return redirect()->route('admin.venues.index')->with('success', 'Venue updated successfully.');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id)
  {
    $venue = Venue::findOrFail($id);
    $venue->delete();
    return redirect()->route('admin.venues.index')->with('success', 'Venue deleted successfully.');
  }
}
