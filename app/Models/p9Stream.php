<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class p9Stream extends Model
{
    use HasFactory;

    public function p9():BelongsTo
    {
        return $this->belongsTo(P9::class);
    }

    public function stream():BelongsTo
    {
        return $this->belongsTo(Stream::class);
    }
}
