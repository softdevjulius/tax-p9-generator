<?php

namespace App\Http\Controllers;

use App\Models\P9;
use Illuminate\Http\Request;
use Repo\TaxHandler;
use function GuzzleHttp\Promise\all;

class GenerateP9Controller extends Controller
{
//    public function __constructor()
//    {
//        if (\request()->has("code"))
//    }
    public function step1(Request $request)
    {
        if ($request->isMethod("GET")) return view("tax_return.step1");

        if (!$request->has("code") || empty($p9 = P9::whereCode($request->code)->first())) {
            $p9 = P9::create([
                "account_type" => $request->account_type
            ]);
        }

        if ($p9->account_type == 'corporate')
            return redirect()->route("business_step_2", ['code' => $p9->code])
                ->with([
                    "success" => 1,
                    "msg" => "Success",
                ]);

        return redirect()->route("generate_p9_step_2", ['code' => $p9->code])
            ->with([
                "success" => 1,
                "msg" => "Success",
            ]);


    }

    public function step2(Request $request)
    {

        if (!request()->has("code")) return redirect()->route("generate_p9_step_1");

        $p9 = P9::whereCode($request->code)->firstOrFail();


        if ($request->isMethod("GET")) return view("tax_return.step2",compact("p9"));

        $p9->update($request->only(["name", "kra_pin", "basic_salary", "year",]));

        return redirect()->route("generate_p9_step_3", ['code' => $request->code])
            ->with([
                "success" => 1,
                "msg" => "Success",
            ]);

    }

    public function step3(Request $request)
    {
        if (!request()->has("code")) return redirect()->route("generate_p9_step_1");

        if ($request->isMethod("GET")) return view("tax_return.step3");

        $p9 = P9::whereCode($request->code)->firstOrFail();

//        if (sizeof($request->allowance_name)>0){
//            foreach ($request->allowance_name as $index => $allowance) {
//            if(empty($request->allowance_amount[$index]))
//                continue;
//
//            $p9->allowances()->create([
//                "name" => $request->allowance_name[$index],
//                "amount" => $request->allowance_amount[$index],
//            ]);
//        }
//        }
//
//        if (sizeof($request->allowance_name)>0){
//            foreach ($request->deduction_name as $index => $allowance) {
//            if(empty($request->deduction_amount[$index]))
//                continue;
//
//            $p9->deductions()->create([
//                "name" => $request->deduction_name[$index],
//                "amount" => $request->deduction_amount[$index],
//            ]);
//        }
//        }

        return redirect()->route("generate_p9_step_4", ["code" => $request->code])->with([
            "success" => 1,
            "msg" => "Success",
        ]);
    }

    public function step4(Request $request)
    {
        if ($request->isMethod("GET")) return view("tax_return.step4");

        $p9 = P9::whereCode($request->code)->firstOrFail();

        $p9->update([
            "phone" => format_phone_number($request->phone_number),
            "amount" => $request->amount
        ]);

        return redirect()->route("generate_p9_step_5", ["code" => $request->code])->with([
            "success" => 1,
            "msg" => "Success",
        ]);
    }

    public function step5(Request $request)
    {
        if ($request->isMethod("GET")) return view("tax_return.step5");

        $p9 = P9::whereCode($request->code)->firstOrFail();

        $tax = .3 * ($p9->basic_salary + $p9->allowances()->sum("amount") - $p9->deductions()->sum("amount"));

        $p9->update([
            "email" => $request->business_email,
            "tax" => $tax
        ]);

        //calculate tax amount

        if ($request->submit_action == "download_pdf") {
            extract($this->taxPreviewData($p9));
            $full_width = 1;

            $pdf = \PDF::loadView("tax_return.tax_calculation_preview", compact("kra_pin",
                "basic_income",
                "allowances",
                "deductions",
                "taxable_income",
                "total_tax",
                "personal_relief",
                "tax_payable",
                "total_other_income_amount",
                "total_taxable_other_income",
                "total_withholding_tax",
                "total_individual_income_tax",
                "full_width"
            ));
            return $pdf->download("p.pdf");
        } else {
            //send via email

        }


        return redirect()->route("generate_p9_step_6", ["code" => $request->code])->with([
            "success" => 1,
            "msg" => "Success",
        ]);
    }

    private function taxPreviewData(P9 $p9){
        $kra_pin = $p9->kra_pin;

        $basic_income = $p9->basic_salary;
        $allowances = $p9->allowances()->sum("amount");
        $deductions = $p9->deductions()->sum("amount");

        $taxable_income = (new TaxHandler($p9))->taxableIncome();
        $total_tax = (new TaxHandler($p9))->totalTax();
        $personal_relief = (new TaxHandler($p9))->taxRelief();
        $tax_payable = $total_tax - $personal_relief;

        $total_other_income_amount = $p9->incomes()->sum("amount");
        $total_taxable_other_income = $p9->incomes->sum(function ($income){
            return $income->amount - $income->expense_amount;
        });
        $total_individual_income_tax = (new TaxHandler($p9))->calculateTaxAmount($total_taxable_other_income);
        $total_individual_income_tax = ($total_individual_income_tax>$personal_relief?($total_individual_income_tax-$personal_relief):0) ;
        $total_withholding_tax = $p9->incomes->sum(function ($income){
            if (empty($income->withholding_tax) && $income->withholding_tax<=0)
                return 0;
            return $income->amount * (16/100) * ($income->withholding_tax / 100);
        });

        return compact(
            "kra_pin",
            "basic_income",
            "allowances",
            "deductions",
            "taxable_income",
            "total_tax",
            "personal_relief",
            "tax_payable",
            "total_other_income_amount",
            "total_taxable_other_income",
            "total_individual_income_tax",
            "total_withholding_tax");
    }

    public function taxPreview(Request $request)
    {
        $p9 = P9::whereCode($request->code)->firstOrFail();

        if ($request->isMethod("GET")){

            $tax_preview_data = $this->taxPreviewData($p9);

            extract($tax_preview_data);

            return view("tax_return.tax_calculation_preview", compact(
                "kra_pin",
                "basic_income",
                "allowances",
                "deductions",
                "taxable_income",
                "total_tax",
                "personal_relief",
                "tax_payable",
                "total_other_income_amount",
                "total_taxable_other_income",
                "total_withholding_tax",
                "total_individual_income_tax",

            ));
        }

        parse_str($request->data,$data);

        //delete deductions and allowances..and incomces
        $p9 -> allowances() -> delete();
        $p9 -> deductions() -> delete();
        $p9 -> incomes() -> delete();

        $index=0;
        if (isset($data['allowance_amount']))
        foreach ($data['allowance_amount'] as $allowance_amount) {

            if (!empty($allowance_amount) && $allowance_amount>0){
                $p9->allowances()->create([
                   "name" => $data['allowance_name'][$index],
                   "amount" => $allowance_amount,
                ]);
            }

            $index+=1;
        }
        $index=0;
        if (isset($data['deduction_amount']))
        foreach ($data['deduction_amount'] as $deduction_amount) {

            if (!empty($deduction_amount) && $deduction_amount>0){
                $p9->deductions()->create([
                   "name" => $data['deduction_name'][$index],
                   "amount" => $deduction_amount,
                ]);
            }

            $index+=1;
        }
        $index=0;
        if (isset($data['income_amount']))
        foreach ($data['income_amount'] as $income_amount) {

            if (!empty($income_amount) && $income_amount>0){
                $p9->incomes()->create([
                   "name" => $data['income_name'][$index],
                   "amount" => $income_amount,
                   "expense_amount" => doubleval($data['income_expense_amount'][$index]),
                   "withholding_tax" => doubleval($data['withholding_tax'][$index]),
                ]);
            }

            $index+=1;
        }

    }
}
