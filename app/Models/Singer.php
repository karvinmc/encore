<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Singer extends Model
{
  protected $fillable = ['name', 'description', 'genre', 'image'];

  public function concerts(): BelongsToMany
  {
    return $this->belongsToMany(Concert::class)->withTimestamps();
  }

  public function genre(): BelongsTo
  {
    return $this->belongsTo(Genre::class);
  }
}
