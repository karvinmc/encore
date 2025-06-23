<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;

use App\Models\Concert;
use App\Models\Singer;
use App\Models\Genre;

class ConcertController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $concerts = Concert::with(['venue', 'singers'])
      ->where('date', '>=', now())
      ->orderBy('date', 'asc')
      ->get()
      ->map(function ($concert) {
        $date = Carbon::parse($concert->date);

        $concert->day = $date->format('d');
        $concert->month = $date->format('F');
        $concert->day_name = strtoupper($date->format('D'));
        $concert->time = $date->format('H:i');

        return $concert;
      });

    $singers = Singer::orderBy('name')->take(3)->get();

    return view('concerts.index', [
      'concerts' => $concerts,
      'singers' => $singers
    ]);
  }

  /**
   * Display a listing of the resource for a specific genres.
   */
  public function genre(string $genre)
  {

    // Find the genre by name or fail if not found
    $genre = Genre::where('name', $genre)->firstOrFail();

    $concerts = Concert::with(['venue', 'singers.genre'])
      ->where('date', '>=', now())
      ->whereHas('singers', function ($query) use ($genre) {
        $query->where('genre_id', $genre->id);
      })
      ->orderBy('date', 'asc')
      ->get()
      ->map(function ($concert) {

        $date = Carbon::parse($concert->date);
        $concert->day = $date->format('d');
        $concert->month = $date->format('F');
        $concert->day_name = strtoupper($date->format('D'));
        $concert->time = $date->format('H:i');

        return $concert;
      });

    return view('concerts.genre', [
      'concerts' => $concerts,
      'genre' => $genre->name,
    ]);
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    //
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    //
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
