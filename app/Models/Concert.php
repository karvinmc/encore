<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Concert extends Model
{
  protected $fillable = ['name', 'description', 'date', 'venue_id'];

  public function venue(): BelongsTo
  {
    return $this->belongsTo(Venue::class);
  }

  public function tickets(): HasMany
  {
    return $this->hasMany(Ticket::class);
  }

  public function singers(): BelongsToMany
  {
    return $this->belongsToMany(Singer::class)->withTimestamps();
  }
}
