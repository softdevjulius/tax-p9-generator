<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class P9 extends Model
{
    use HasFactory;

    const ACCOUNT_TYPES = [
        "CORPORATE" => "corporate",
        "INDIVIDUAL" => "individual"
    ];

    public function monthSalaries()
    {
        return $this->hasMany(P9MonthBasicSalary::class,"");
    }

    public function returnInformation()
    {
        return $this->hasOne(ReturnInformation::class,"p9_id");
    }
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

    public function bankDetail():HasOne
    {
        return $this->hasOne(P9BankDetail::class,'p9_id');
    }

    public function auditor():HasOne
    {
        return $this->hasOne(P9Auditor::class,'p9_id');
    }

    public function shouldDeclareForWife():bool
    {
        return boolval($this->returnInformation?->declare_wife_income);
    }

    public function landlord():HasOne
    {
        return $this->hasOne(P9Landlord::class,'p9_id');
    }

    public function landlordWife():HasOne
    {
        return $this->hasOne(P9LandlordWife::class,'p9_id');
    }

    public function tenants():HasMany
    {
        return $this->hasMany(P9Tenant::class,'p9_id');
    }

    public function tenantWives():HasMany
    {
        return $this->hasMany(P9TenantWife::class,'p9_id');
    }

    public function files():HasMany
    {
        return $this->hasMany(P9File::class,'p9_id');
    }

    public static function boot()
    {
        parent::boot();

        static::creating(function ($p9){
            $p9->code = P9::generateUniqueCode();
        });
    }
}
