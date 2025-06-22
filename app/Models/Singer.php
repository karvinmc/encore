<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Singer extends Model
{
  protected $fillable = ['name', 'description', 'genre'];

  public function concerts(): BelongsToMany
  {
    return $this->belongsToMany(Concert::class)->withTimestamps();
  }
}