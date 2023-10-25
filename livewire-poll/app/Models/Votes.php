<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Votes extends Model
{
    use HasFactory;

    public function option() : BelongsTo
    {
       return $this->belongsTo(Options::class);
    }
}
