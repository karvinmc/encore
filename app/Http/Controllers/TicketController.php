<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;

use App\Models\Concert;
use App\Models\Ticket;

class TicketController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    //
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
