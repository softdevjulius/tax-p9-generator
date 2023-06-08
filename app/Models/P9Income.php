<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class P9Income extends Model
{
    use HasFactory;

    public function expenses():HasMany
    {
        return $this->hasMany(p9IncomeExpense::class,'income_id');
    }
}
