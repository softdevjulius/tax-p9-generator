<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class P9Auditor extends Model
{
    use HasFactory;

    public function p9():BelongsTo
    {
        return $this->belongsTo(P9::class,'p9_id');
    }
}
