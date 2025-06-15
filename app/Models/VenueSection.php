<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class VenueSection extends Model
{
  protected $fillable = ['venue_id', 'name', 'type', 'capacity'];

  public function venue(): BelongsTo
  {
    return $this->belongsTo(Venue::class);
  }

  public function tickets(): HasMany
  {
    return $this->hasMany(Ticket::class);
  }
}
