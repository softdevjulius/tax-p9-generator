<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class P9 extends Model
{
    use HasFactory;

    const ACCOUNT_TYPES = [
        "CORPORATE" => "corporate",
        "INDIVIDUAL" => "individual"
    ];

    public static function generateUniqueCode()
    {
        $largest_base = 30;
        $lease_base = 10;

        $last_number = "B20C4A9A1F3";

        if (($model = new P9())->exists())
            $last_number = $model->orderByDesc("code")->value("code")??$last_number;

        return strtoupper(base_convert(intval(base_convert($last_number,$largest_base,$lease_base)) + 1,$lease_base,$largest_base));
    }

    public function allowances():HasMany
    {
        return $this->hasMany(P9Allowance::class);
    }

    public function deductions():HasMany
    {
        return $this->hasMany(P9Deduction::class);
    }

    public function streams():HasMany
    {
        return $this->hasMany(p9Stream::class);
    }

    public function incomes()
    {
        return $this->hasMany(P9Income::class);
    }

    public static function boot()
    {
        parent::boot();

        static::creating(function ($p9){
            $p9->code = P9::generateUniqueCode();
        });
    }
}
