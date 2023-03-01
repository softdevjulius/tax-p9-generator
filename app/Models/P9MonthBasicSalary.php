<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class P9MonthBasicSalary extends Model
{
    use HasFactory;

    public function p9()
    {
        return $this->belongsTo(P9::class);
    }
}
