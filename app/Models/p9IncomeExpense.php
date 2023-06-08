<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class p9IncomeExpense extends Model
{
    use HasFactory;

    public function income():BelongsTo
    {
        return $this->belongsTo(P9Income::class,'income_id');
    }
}
