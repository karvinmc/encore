<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Booking;
use App\Models\Ticket;

class BookingController extends Controller
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
  public function store(Request $request, $id)
  {
    $user = Auth::user(); // Make sure user is authenticated
    $selectedTickets = json_decode($request->input('tickets'), true);

    foreach ($selectedTickets as $ticketData) {
      $ticket = Ticket::where('concert_id', $id)
        ->whereHas('section', function ($query) use ($ticketData) {
          $query->where('name', $ticketData['section']);
        })->firstOrFail();

      $quantity = (int) $ticketData['quantity'];
      $total = $ticket->price * $quantity;

      Booking::create([
        'user_id' => $user->id,
        'ticket_id' => $ticket->id,
        'quantity' => $quantity,
        'total_price' => $total,
        'status' => 'paid',
      ]);
    }

    return redirect('/')->with('success', 'Booking successful!');
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
