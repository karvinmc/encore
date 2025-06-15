<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Venue extends Model
{
  protected $fillable = ['name', 'location', 'capacity'];

  public function sections(): HasMany
  {
    return $this->hasMany(VenueSection::class);
  }

  public function concerts(): HasMany
  {
    return $this->hasMany(Concert::class);
  }
}
