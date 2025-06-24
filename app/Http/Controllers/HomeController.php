<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;

use App\Models\Concert;
use App\Models\Singer;

class HomeController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $concerts = Concert::with('venue')
      ->where('date', '>=', now())
      ->orderBy('date', 'asc')
      ->get()
      ->map(function ($concert) {
        $concert->formatted_date = Carbon::parse($concert->date)->format('d F Y • H:i');
        return $concert;
      });

    $uniqueSingers = collect();
    foreach ($concerts as $concert) {
      foreach ($concert->singers as $singer) {
        if (!$uniqueSingers->contains('id', $singer->id)) {
          $uniqueSingers->push($singer);
        }
        if ($uniqueSingers->count() >= 3) break 2;
      }
    }

    return view('home', ['concerts' => $concerts, 'uniqueSingers' => $uniqueSingers]);
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
