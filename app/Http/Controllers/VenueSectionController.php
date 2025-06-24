<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Venue;
use App\Models\VenueSection;

class VenueSectionController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index(Request $request)
  {
    $venues = Venue::all();
    $query = VenueSection::with('venue');

    if ($request->filled('venue_id')) {
      $query->where('venue_id', $request->venue_id);
    }

    $sections = $query->get();

    return view('admin.venue_sections.index', compact('sections', 'venues'));
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    $validated = $request->validate([
      'venue_id' => 'required|exists:venues,id',
      'name' => 'required|string|max:255',
      'type' => 'required|in:standing,seated',
    ]);

    VenueSection::create($validated);

    return redirect()->route('admin.venue_sections.index')->with('success', 'Section created successfully.');
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, string $id)
  {
    $section = VenueSection::findOrFail($id);
    $validated = $request->validate([
      'venue_id' => 'required|exists:venues,id',
      'name' => 'required|string|max:255',
      'type' => 'required|in:standing,seated',
    ]);

    $section->update($validated);

    return redirect()->route('admin.venue_sections.index')->with('success', 'Section updated successfully.');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id)
  {
    $section = VenueSection::findOrFail($id);
    $section->delete();
    return redirect()->route('admin.venue_sections.index')->with('success', 'Section deleted successfully.');
  }
}
