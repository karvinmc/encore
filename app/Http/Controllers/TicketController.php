<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;

use App\Models\Concert;
use App\Models\Ticket;
use App\Models\VenueSection;

class TicketController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index(Request $request)
  {
    $concerts = Concert::all();
    $sections = VenueSection::all();

    $ticketsQuery = Ticket::with(['concert', 'section']);
    if ($request->filled('concert_id')) {
      $ticketsQuery->where('concert_id', $request->concert_id);
    }
    $tickets = $ticketsQuery->get();

    return view('admin.tickets.index', compact('concerts', 'sections', 'tickets'));
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
    $validated = $request->validate([
      'concert_id' => 'required|exists:concerts,id',
      'venue_section_id' => 'required|exists:venue_sections,id',
      'price' => 'required|numeric|min:0',
      'stock' => 'required|integer|min:0',
    ]);

    Ticket::create($validated);

    return redirect()->route('admin.tickets.index')->with('success', 'Ticket created successfully.');
  }

  /**
   * Display the specified resource.
   */
  public function show(string $id)
  {
    $concert = Concert::with(['venue', 'singers'])->findOrFail($id);
    $date = Carbon::parse($concert->date);
    $concert->full_date = $date->format('D, d F Y • H:i');
    $tickets = Ticket::with('section')->where('concert_id', $id)->get();

    return view('tickets.book', [
      'concert' => $concert,
      'tickets' => $tickets,
    ]);
  }

  public function confirm(Request $request, $id)
  {
    $concert = Concert::with('venue')->findOrFail($id);
    $selectedTickets = json_decode($request->input('tickets'), true);

    return view('tickets.confirmation', compact('concert', 'selectedTickets'));
  }

  public function book() {}

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(string $id)
  {
    $ticket = Ticket::findOrFail($id);
    $concerts = Concert::all();
    $sections = VenueSection::all();
    return view('admin.tickets.index', compact('ticket', 'concerts', 'sections'));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, string $id)
  {
    $ticket = Ticket::findOrFail($id);
    $validated = $request->validate([
      'concert_id' => 'nullable|exists:concerts,id',
      'venue_section_id' => 'nullable|exists:venue_sections,id',
      'price' => 'nullable|numeric|min:0',
      'stock' => 'nullable|integer|min:0',
    ]);

    $ticket->update([
      'concert_id' => $validated['concert_id'] ?? $ticket->concert_id,
      'venue_section_id' => $validated['venue_section_id'] ?? $ticket->venue_section_id,
      'price' => $validated['price'] ?? $ticket->price,
      'stock' => $validated['stock'] ?? $ticket->stock,
    ]);

    return redirect()->route('admin.tickets.index')->with('success', 'Ticket updated successfully.');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id)
  {
    $ticket = Ticket::findOrFail($id);
    $ticket->delete();
    return redirect()->route('admin.tickets.index')->with('success', 'Ticket deleted successfully.');
  }
}
