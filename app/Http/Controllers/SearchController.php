<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;

use App\Models\Concert;
use App\Models\Singer;
use App\Models\Genre;

class SearchController extends Controller
{
  public function search(Request $request)
  {
    $query = Concert::query()->with('singers', 'venue');

    // Search by keyword
    if ($search = $request->query('search')) {
      $query->where(function ($q) use ($search) {
        $q->where('name', 'like', "%$search%")
          ->orWhereHas('singers', fn($q) => $q->where('name', 'like', "%$search%"))
          ->orWhereHas('venue', fn($q) => $q->where('name', 'like', "%$search%"));
      });
    }

    // Filter by start and end date
    if ($request->filled('start')) {
      $query->whereDate('date', '>=', $request->query('start'));
    }
    if ($request->filled('end')) {
      $query->whereDate('date', '<=', $request->query('end'));
    }

    $concerts = $query->orderBy('date')->paginate(12);

    $concerts->getCollection()->transform(function ($concert) {
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
}
