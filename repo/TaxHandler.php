<?php

namespace Repo;

use App\Models\P9;
use function GuzzleHttp\Promise\all;

class TaxHandler
{
    private $p9;
    public function __construct(P9 $p9)
    {
        $this->p9 = $p9;
    }


    public function taxableIncome()
    {
        $p9 = $this->p9;

//        $nhif = $p9->should_pay_nhif?$p9->nhif:0;
        $nssf = $p9->should_pay_nssf?$p9->nssf:0;

        $basic_income = $p9->basic_salary;
        $allowances = $p9->allowances()->sum("amount");
        $deductions = $p9->deductions()->sum("amount") + $nssf;

        return $basic_income - $deductions + $allowances;
    }

    private function taxRates()
    {
        return [
            [
                "maximum_annually" => "288000",
                "maximum_monthly" => "24000",
                "rate" => 10/100
            ],
            [
                "maximum_annually" => "100000",
                "maximum_monthly" => "8333",
                "rate" => 25/100
            ],
            [
                "maximum_annually" => 0,
                "maximum_monthly" => 0,
                "rate" => 30/100
            ]
        ];

        /*
        return [
            [
                "maximum_annually" => "288000",
                "maximum_monthly" => "24000",
                "rate" => 10/100
            ],
            [
                "maximum_annually" => "100000",
                "maximum_monthly" => "8333",
                "rate" => 25/100
            ],
            [
                "maximum_annually" => 0,
                "maximum_monthly" => 0,
                "rate" => 10/100
            ]
        ];*/
    }

    private function personalRelief()
    {
        return [
            "monthly" => 2400,
            "annually" => 28800,
        ];
    }

    public function calculateTaxAmount($taxable_income)
    {
        $rates = $this->taxRates();
        $rate_count = sizeof($rates);
        $count = 0;
        $tax_total = 0;
        $remaining = $taxable_income;
        foreach ($rates as $rate) {

            $count+=1;

            if ($count == $rate_count){

                $tax_total += $remaining * $rate['rate'];
                break;

            }else{

                $to_be_taxed = min($remaining, $rate['maximum_monthly']);
                $tax_total+= $to_be_taxed * $rate['rate'];

                $remaining -= $to_be_taxed;


                if ($remaining <= 0)
                    break;
            }

        }

        return $tax_total;
    }
    public function totalTax()
    {
        $taxable_income = $this->taxableIncome();

        return $this->calculateTaxAmount($taxable_income);

    }

    public function taxRelief($index="monthly")
    {
        return $this->personalRelief()[$index];
    }
}
