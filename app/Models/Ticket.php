<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Ticket extends Model
{
  protected $fillable = ['concert_id', 'venue_section_id', 'price', 'stock'];

  public function concert(): BelongsTo
  {
    return $this->belongsTo(Concert::class);
  }

  public function section(): BelongsTo
  {
    return $this->belongsTo(VenueSection::class, 'venue_section_id');
  }

  public function bookings(): HasMany
  {
    return $this->hasMany(Booking::class);
  }
}