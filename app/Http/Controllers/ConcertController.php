<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;

use App\Models\Concert;
use App\Models\Singer;

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

    // Extract 3 unique singers
    $uniqueSingers = collect();
    foreach ($concerts as $concert) {
      foreach ($concert->singers as $singer) {
        if (!$uniqueSingers->contains('id', $singer->id)) {
          $uniqueSingers->push($singer);
        }
        if ($uniqueSingers->count() >= 3) break 2;
      }
    }

    return view('concerts.index', [
      'concerts' => $concerts,
      'singers' => $uniqueSingers
    ]);
  }

  /**
   * Display a listing of the resource for a specific genres.
   */
  public function genre(string $genre)
  {

    $concerts = Concert::with(['venue', 'singers'])
      ->where('date', '>=', now())
      ->whereHas('singers', fn($q) => $q->where('genre', $genre))
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

    $singers = Singer::where('genre', $genre)
      ->whereHas('concerts', fn($q) => $q->where('date', '>=', now()))
      ->get();

    return view('concerts.genre', compact('concerts', 'singers', 'genre'));
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
