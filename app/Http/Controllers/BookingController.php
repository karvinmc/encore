<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Booking;
use App\Models\Ticket;
use App\Models\User;

class BookingController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $users = User::all();
    $tickets = Ticket::with('concert', 'section.venue')->get();
    $bookings = Booking::with('user', 'ticket')->get();

    return view('admin.bookings.index', compact('bookings', 'users', 'tickets'));
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

      $ticket->decrement('stock', $quantity);
    }

    return redirect('/')->with('success', 'Booking successful!');
  }

  /**
   * Display the specified resource.
   */
  public function show()
  {
    $user = Auth::user();

    $bookings = Booking::with(['ticket.concert', 'ticket.section.venue']) // assuming your relationships are set up correctly
      ->where('user_id', $user->id)
      ->orderByDesc('created_at')
      ->get();

    return view('mybookings', compact('bookings'));
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
    $booking = Booking::findOrFail($id);
    $validated = $request->validate([
      'user_id' => 'nullable|exists:users,id',
      'ticket_id' => 'nullable|exists:tickets,id',
      'quantity' => 'nullable|integer|min:1',
      'status' => 'nullable|in:paid,pending,cancelled',
    ]);

    $oldTicket = $booking->ticket;
    $oldQuantity = $booking->quantity;
    $newTicketId = $validated['ticket_id'] ?? $booking->ticket_id;
    $newQuantity = $validated['quantity'] ?? $booking->quantity;

    // If ticket or quantity changed, adjust stock
    if ($newTicketId != $booking->ticket_id) {
      // Restore stock to old ticket
      $oldTicket->increment('stock', $oldQuantity);
      $newTicket = Ticket::findOrFail($newTicketId);
      if ($newTicket->stock < $newQuantity) {
        return back()->withErrors(['quantity' => 'Not enough stock for this ticket.'])->withInput();
      }
      $newTicket->decrement('stock', $newQuantity);
    } else {
      $quantityDiff = $newQuantity - $oldQuantity;
      if ($oldTicket->stock < $quantityDiff) {
        return back()->withErrors(['quantity' => 'Not enough stock for this ticket.'])->withInput();
      }
      $oldTicket->decrement('stock', $quantityDiff);
    }

    $ticket = Ticket::findOrFail($newTicketId);
    $total = $ticket->price * $newQuantity;

    $booking->update([
      'user_id' => $validated['user_id'] ?? $booking->user_id,
      'ticket_id' => $newTicketId,
      'quantity' => $newQuantity,
      'total_price' => $total,
      'status' => $validated['status'] ?? $booking->status,
    ]);

    return redirect()->route('admin.bookings.index')->with('success', 'Booking updated successfully.');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id)
  {
    $booking = Booking::findOrFail($id);
    $ticket = $booking->ticket;
    $ticket->increment('stock', $booking->quantity); // restore stock
    $booking->delete();
    return redirect()->route('admin.bookings.index')->with('success', 'Booking deleted successfully.');
  }
}
