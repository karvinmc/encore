<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;

use App\Models\Singer;
use App\Models\Genre;

class SingerController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $singers = Singer::with('genre')->get();
    $genres = Genre::all();

    return view('admin.singers.index', compact('singers', 'genres'));
  }

  public function user_index()
  {
    $singers = Singer::orderBy('name', 'asc')->paginate(12);

    return view('singers.index', compact('singers'));
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    $validated = $request->validate([
      'name' => 'required|string|max:255',
      'description' => 'required|string',
      'image' => 'required|string|max:255',
      'genre_id' => 'required|exists:genres,id',
    ]);

    Singer::create($validated);

    return redirect()->route('admin.singers.index')->with('success', 'Singer created successfully.');
  }

  /**
   * Display the specified resource.
   */
  public function show(string $id)
  {
    $singer = Singer::with(['concerts.venue'])
      ->findOrFail($id);

    $concerts = $singer->concerts
      ->where('date', '>=', now())
      ->sortBy('date')
      ->map(function ($concert) {
        $date = Carbon::parse($concert->date);
        $concert->day = $date->format('d');
        $concert->month = $date->format('F');
        $concert->day_name = strtoupper($date->format('D'));
        $concert->time = $date->format('H:i');
        return $concert;
      });

    return view('singers.show', [
      'singer' => $singer,
      'concerts' => $concerts
    ]);
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, string $id)
  {
    $singer = Singer::findOrFail($id);
    $validated = $request->validate([
      'name' => 'nullable|string|max:255',
      'description' => 'nullable|string',
      'image' => 'nullable|string|max:255',
      'genre_id' => 'nullable|exists:genres,id',
    ]);

    $singer->update([
      'name' => $validated['name'] ?? $singer->name,
      'description' => $validated['description'] ?? $singer->description,
      'image' => $validated['image'] ?? $singer->image,
      'genre_id' => $validated['genre_id'] ?? $singer->genre_id,
    ]);

    return redirect()->route('admin.singers.index')->with('success', 'Singer updated successfully.');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id)
  {
    $singer = Singer::findOrFail($id);
    $singer->delete();
    return redirect()->route('admin.singers.index')->with('success', 'Singer deleted successfully.');
  }
}
