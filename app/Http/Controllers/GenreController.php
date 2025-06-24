<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Genre;

class GenreController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $genres = Genre::all();

    return view('admin.genres.index', compact('genres'));
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    $validated = $request->validate([
      'name' => 'required|string|max:255',
    ]);

    Genre::create($validated);

    return redirect()->route('admin.genres.index')->with('success', 'Genre created successfully.');
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, string $id)
  {
    $genre = Genre::findOrFail($id);
    $validated = $request->validate([
      'name' => 'required|string|max:255',
    ]);

    $genre->update($validated);

    return redirect()->route('admin.genres.index')->with('success', 'Genre updated successfully.');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id)
  {
    $genre = Genre::findOrFail($id);
    $genre->delete();
    return redirect()->route('admin.genres.index')->with('success', 'Genre deleted successfully.');
  }
}
