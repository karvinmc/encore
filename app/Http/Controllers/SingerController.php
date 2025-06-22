<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;

use App\Models\Singer;

class SingerController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    return view('singers.index');
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
