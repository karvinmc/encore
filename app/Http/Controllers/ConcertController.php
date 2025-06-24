<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;

use App\Models\Concert;
use App\Models\Singer;
use App\Models\Genre;
use App\Models\Venue;

class ConcertController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $concerts = Concert::with('venue', 'singers')->get();
    $venues = Venue::all();
    $singers = Singer::all();

    return view('admin.concerts.index', compact('concerts', 'venues', 'singers'));
  }

  public function user_index()
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
   * Search for specific listing of resources.
   */
  public function search(Request $request)
  {
    $query = Concert::query()->with('singer', 'venue');

    // Search by keyword
    if ($search = $request->query('q')) {
      $query->where(function ($q) use ($search) {
        $q->where('name', 'like', "%$search%")
          ->orWhereHas('singer', fn($q) => $q->where('name', 'like', "%$search%"))
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

    return view('concerts.index', compact('concerts'));
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    $validated = $request->validate([
      'name' => 'required|string|max:255',
      'description' => 'nullable|string',
      'date' => 'required|date',
      'time' => 'required|date_format:H:i',
      'image' => 'required|string|max:255',
      'venue_id' => 'required|exists:venues,id',
    ]);

    // Combine date and time into a single datetime string
    $datetime = $validated['date'] . ' ' . $validated['time'] . ':00';
    $validated['date'] = $datetime;
    unset($validated['time']);

    Concert::create($validated);

    return redirect()->route('admin.concerts.index')->with('success', 'Concert created successfully.');
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, string $id)
  {
    $concert = Concert::findOrFail($id);
    $validated = $request->validate([
      'name' => 'nullable|string|max:255',
      'description' => 'nullable|string',
      'date' => 'nullable|date',
      'time' => 'nullable|date_format:H:i',
      'image' => 'nullable|string|max:255',
      'venue_id' => 'nullable|exists:venues,id',
    ]);

    $updateData = [
      'name' => $validated['name'] ?? $concert->name,
      'description' => array_key_exists('description', $validated) ? $validated['description'] : $concert->description,
      'image' => $validated['image'] ?? $concert->image,
      'venue_id' => $validated['venue_id'] ?? $concert->venue_id,
    ];
    // Only update date if provided
    if (isset($validated['date']) && isset($validated['time'])) {
      $updateData['date'] = $validated['date'] . ' ' . $validated['time'] . ':00';
    } elseif (isset($validated['date'])) {
      // If only date is provided, keep time from old value
      $oldTime = Carbon::parse($concert->date)->format('H:i:s');
      $updateData['date'] = $validated['date'] . ' ' . $oldTime;
    } elseif (isset($validated['time'])) {
      // If only time is provided, keep date from old value
      $oldDate = Carbon::parse($concert->date)->format('Y-m-d');
      $updateData['date'] = $oldDate . ' ' . $validated['time'] . ':00';
    } else {
      $updateData['date'] = $concert->date;
    }

    $concert->update($updateData);

    return redirect()->route('admin.concerts.index')->with('success', 'Concert updated successfully.');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id)
  {
    $concert = Concert::findOrFail($id);
    $concert->delete();
    return redirect()->route('admin.concerts.index')->with('success', 'Concert deleted successfully.');
  }

  public function attachSinger(Request $request)
  {
    $validated = $request->validate([
      'concert_id' => 'required|exists:concerts,id',
      'singer_id' => 'required|exists:singers,id',
    ]);
    $concert = Concert::findOrFail($validated['concert_id']);
    // Prevent duplicate attach
    if ($concert->singers()->where('singer_id', $validated['singer_id'])->exists()) {
      return back()->with('error', 'This singer is already attached to the concert.');
    }
    $concert->singers()->attach($validated['singer_id']);
    return back()->with('success', 'Singer attached to concert.');
  }

  public function detachSinger(Request $request)
  {
    $validated = $request->validate([
      'concert_id' => 'required|exists:concerts,id',
      'singer_id' => 'required|exists:singers,id',
    ]);
    $concert = Concert::findOrFail($validated['concert_id']);
    $concert->singers()->detach($validated['singer_id']);
    return back()->with('success', 'Singer detached from concert.');
  }

  public function updateSingers(Request $request, $concertId)
  {
    $concert = Concert::findOrFail($concertId);
    $validated = $request->validate([
      'singer_ids' => 'array',
      'singer_ids.*' => 'exists:singers,id',
    ]);
    $concert->singers()->sync($validated['singer_ids'] ?? []);
    return back()->with('success', 'Concert singers updated.');
  }
}
