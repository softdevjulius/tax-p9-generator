<?php

namespace App\Http\Controllers;

use App\Models\P9;
use App\Models\P9Tenant;
use App\Models\P9TenantWife;
use App\Models\User;
use App\Notifications\SendP9Notification;
use Carbon\Carbon;
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


        if ($request->isMethod("GET")) return view("tax_return.step2", compact("p9"));

        $p9->update($request->only(["name", "kra_pin", "basic_salary", "year",]));

        //skip step3
        return redirect()->route("generate_p9_step_3", ['code' => $request->code])
            ->with([
                "success" => 1,
                "msg" => "Success",
            ]);

        return redirect()->route("generate_p9_step_4", ['code' => $request->code])
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

        //add incomes
        //alongside income expenses
        foreach ($request->income_expense_amount as $item_number => $expenses) {
            //income
            if (empty($request->income_name[$item_number])) continue;

            $income = $p9->incomes()->create([
                "name" => $request->income_name[$item_number][0],
                "amount" => $request->income_amount[$item_number][0]
            ]);
            foreach ($expenses as $index => $expense) {
                if (empty($expense)) continue;
                //expense
                $income->expenses()->create([
                    "expense_amount" => $request->income_expense_amount[$item_number][$index],
                    "withholding_tax" => $request->withholding_tax[$item_number][$index],
                    "company_name" => $request->income_expense_company_name[$item_number][$index],
                    "company_pin" => $request->income_expense_company_pin[$item_number][$index],
                ]);

            }
        }
        //


        return redirect()->route("generate_p9_step_4", ["code" => $request->code])->with([
            "success" => 1,
            "msg" => "Success",
        ]);
    }

    public function step4(Request $request)
    {
        if (!request()->has("code")) return redirect()->route("generate_p9_step_1");

        $p9 = P9::whereCode($request->code)->firstOrFail();

        if ($request->isMethod("GET")) return view("tax_return.step4", compact("p9"));


        $p9->returnInformation()->updateOrCreate([], [
            "period_from" => ($request['period_from']),
            "period_to" => ($request['period_to']),
            "has_other_income" => boolval($request['has_other_income']),
            "has_partnership_income" => boolval($request['has_partnership_income']),
            "has_estate_trust_income" => boolval($request['has_estate_trust_income']),
            "has_employer_car" => boolval($request['has_employer_car']),
            "has_mortgage" => boolval($request['has_mortgage']),
            "has_home_ownership_plan" => boolval($request['has_home_ownership_plan']),
            "has_life_insurance_policy" => boolval($request['has_life_insurance_policy']),
            "has_commercial_vehicle" => boolval($request['has_commercial_vehicle']),
            "has_foreign_income" => boolval($request['has_foreign_income']),
            "has_disability_exemption_certificate" => boolval($request['has_disability_exemption_certificate']),
            "declare_wife_income" => boolval($request['declare_wife_income']),
            "wife_pin" => ($request['wife_pin']),
            "wife_has_other_income" => boolval($request['wife_has_other_income']),
            "wife_has_disability_exemption_certificate" => boolval($request['wife_has_disability_exemption_certificate']),
        ]);


        return redirect()->route("generate_p9_step_4_bank_detail", ['code' => $request->code])->with([
            "success" => 1,
            "msg" => "Success",
        ]);

    }

    public function step4BankDetail(Request $request)
    {
        if (!request()->has("code")) return redirect()->route("generate_p9_step_1");

        if ($request->isMethod('GET')) return view("tax_return.step4_bank_detail");

        $p9 = P9::whereCode($request->code)->firstOrFail();

        $p9->bankDetail()->updateOrCreate([], [
            "bank_name" => $request['bank_name'],
            "branch_name" => $request['branch_name'],
            "city" => $request['city'],
            "account_holder_name" => $request['account_holder_name'],
            "account_number" => $request['account_number'],
        ]);

        return redirect()->route("generate_p9_step_4_auditor", ['code' => $request->code])->with([
            "success" => 1,
            "msg" => "Success",
        ]);

    }

    public function step4Auditor(Request $request)
    {
        if (!request()->has("code")) return redirect()->route("generate_p9_step_1");

        $p9 = P9::whereCode($request->code)->firstOrFail();

        if ($request->isMethod('GET')) return view("tax_return.step4_auditor", ['should_declare_for_wife' => $p9->shouldDeclareForWife()]);

        $p9->auditor()->updateOrCreate([], [
            "self_auditor_pin" => $request->self_auditor_pin,
            "wife_auditor_pin" => $request->wife_auditor_pin,
            "self_auditor_name" => $request->self_auditor_name,
            "wife_auditor_name" => $request->wife_auditor_name,
            "self_auditor_certificate_date" => $request->self_auditor_certificate_date,
            "wife_auditor_certificate_date" => $request->wife_auditor_certificate_date,
        ]);

        return redirect()->route("generate_p9_step_4_landlord", ['code' => $request->code])->with([
            "success" => 1,
            "msg" => "Success",
        ]);

    }

    public function step4Landlord(Request $request)
    {
        if (!request()->has("code")) return redirect()->route("generate_p9_step_1");

        $p9 = P9::whereCode($request->code)->firstOrFail();

        if ($request->isMethod('GET')) return view("tax_return.step4_landlord", ['should_declare_for_wife' => $p9->shouldDeclareForWife()]);

        $p9->landlord()->updateOrCreate([], [
            "landlord_pin" => $request->landlord_pin,
            "landlord_name" => $request->landlord_name,
            "lr_number" => $request->lr_number,
            "building" => $request->building,
            "street" => $request->street,
            "city" => $request->city,
            "county" => $request->county,
            "district" => $request->district,
            "locality" => $request->locality,
            "area" => $request->area,
            "po_box" => $request->po_box,
            "po_name" => $request->po_name,
            "postal_code" => $request->postal_code,
            "date_from" => $request->date_from,
        ]);

        $route_name = $p9->shouldDeclareForWife() ? "generate_p9_step_4_landlord_wife" : "generate_p9_step_4_tenant";

        return redirect()->route($route_name, ['code' => $request->code])->with([
            "success" => 1,
            "msg" => "Success",
        ]);

    }

    public function step4Tenant(Request $request)
    {
        if (!request()->has("code")) return redirect()->route("generate_p9_step_1");

        $p9 = P9::whereCode($request->code)->firstOrFail();
        $tenants = $p9->tenants;

        if ($request->isMethod('GET')) return view("tax_return.step4_tenant", compact("p9", 'tenants'));

        dd($request->all());

//        $p9->tenants()->create()
    }

    public function step4DeleteTenant($id, Request $request)
    {
        P9Tenant::whereId($id)->delete();

        return redirect()->route("generate_p9_step_4_tenant", ['code' => $request->code])->with([
            "success" => 1,
            "msg" => "Success",
        ]);
    }

    public function step4AddTenant(Request $request)
    {
        if (!request()->has("code")) return redirect()->route("generate_p9_step_1");

        $p9 = P9::whereCode($request->code)->firstOrFail();

        if ($request->isMethod("GET")) return view("tax_return.step4_add_tenant");

        $p9->tenants()->create([
            "pin" => $request->pin,
            "name" => $request->tenant_name,
            "lr_number" => $request->lr_number,
            "building" => $request->building,
            "street" => $request->street,
            "city" => $request->city,
            "county" => $request->county,
            "district" => $request->district,
            "locality" => $request->locality,
            "area" => $request->area,
            "po_box" => $request->po_box,
            "po_name" => $request->po_name,
            "postal_code" => $request->postal_code,
            "date_from" => $request->date_from,
        ]);

        return redirect()->route("generate_p9_step_4_tenant", ['code' => $request->code])->with([
            "success" => 1,
            "msg" => "Success",
        ]);
    }


    public function step4TenantWife(Request $request)
    {
        if (!request()->has("code")) return redirect()->route("generate_p9_step_1");

        $p9 = P9::whereCode($request->code)->firstOrFail();
        $tenant_wives = $p9->tenantWives;

        if ($request->isMethod('GET')) return view("tax_return.step4_tenant_wives", compact("p9", 'tenant_wives'));

        dd($request->all());

//        $p9->tenants()->create()
    }

    public function step4DeleteTenantWife($id, Request $request)
    {
        P9TenantWife::whereId($id)->delete();

        return redirect()->route("generate_p9_step_4_tenant_wife", ['code' => $request->code])->with([
            "success" => 1,
            "msg" => "Success",
        ]);
    }

    public function step4AddTenantWife(Request $request)
    {
        if (!request()->has("code")) return redirect()->route("generate_p9_step_1");

        $p9 = P9::whereCode($request->code)->firstOrFail();

        if ($request->isMethod("GET")) return view("tax_return.step4_add_tenant_wife");

        $p9->tenantWives()->create([
            "pin" => $request->pin,
            "name" => $request->tenant_name,
            "lr_number" => $request->lr_number,
            "building" => $request->building,
            "street" => $request->street,
            "city" => $request->city,
            "county" => $request->county,
            "district" => $request->district,
            "locality" => $request->locality,
            "area" => $request->area,
            "po_box" => $request->po_box,
            "po_name" => $request->po_name,
            "postal_code" => $request->postal_code,
            "date_from" => $request->date_from,
        ]);

        return redirect()->route("generate_p9_step_4_tenant_wife", ['code' => $request->code])->with([
            "success" => 1,
            "msg" => "Success",
        ]);
    }

    public function step4LandlordWife(Request $request)
    {
        if (!request()->has("code")) return redirect()->route("generate_p9_step_1");

        $p9 = P9::whereCode($request->code)->firstOrFail();

        if ($request->isMethod('GET')) return view("tax_return.step4_landlord_wife", ['should_declare_for_wife' => $p9->shouldDeclareForWife()]);


        $p9->landlordWife()->updateOrCreate([], [
            "landlord_pin" => $request->landlord_pin,
            "landlord_name" => $request->landlord_name,
            "lr_number" => $request->lr_number,
            "building" => $request->building,
            "street" => $request->street,
            "city" => $request->city,
            "county" => $request->county,
            "district" => $request->district,
            "locality" => $request->locality,
            "area" => $request->area,
            "po_box" => $request->po_box,
            "po_name" => $request->po_name,
            "postal_code" => $request->postal_code,
            "date_from" => $request->date_from,
        ]);

        return redirect()->route("generate_p9_step_4_landlord", ['code' => $request->code])->with([
            "success" => 1,
            "msg" => "Success",
        ]);

    }

    public function step5(Request $request)
    {
        if (!request()->has("code")) return redirect()->route("generate_p9_step_1");

        if ($request->isMethod("GET")) return view("tax_return.step5");


        $p9 = P9::whereCode($request->code)->firstOrFail();

        $p9->update([
            "phone" => format_phone_number($request->phone_number),
            "amount" => $request->amount
        ]);

        trigger_mpesa_stk_push($p9->mpesa_phone ?? $p9->phone, $p9->amount, $p9->code, $p9->code);

        return redirect()->route("generate_p9_step_6", ["code" => $request->code])->with([
            "success" => 1,
            "msg" => "Success",
        ]);
    }

    public function calculateTaxableIncome($amount, $deduction, $allowance, $nssf, $should_pay_nssf)
    {
        return $amount - ($deduction + ($should_pay_nssf ? $nssf : 0) + $allowance);
    }

    public function step6(Request $request)
    {
        $p9 = P9::whereCode($request->code)->firstOrFail();

        if ($request->isMethod("GET")) {
            $amount = $p9->basic_salary;
            $allowances = $p9->allowances()->sum("amount");
            $deductions = $p9->deductions()->sum("amount");

            $nssf = array_sum($this->calculateNssf($amount));
            $taxable_income = (new TaxHandler($p9))->taxableIncome();
            $total_tax = (new TaxHandler($p9))->totalTax();
            $personal_relief = (new TaxHandler($p9))->taxRelief();
            $tax = $total_tax - $personal_relief;

            $name = $p9->name;
            $pin = $p9->kra_pin;

            return view("tax_return.step6", [
                "table" => view("tax_return.p9_export_table", compact(
                    "p9",
                    "amount", "allowances", "deductions", "nssf", "taxable_income", "total_tax",
                    "personal_relief", "tax", "name", "pin"
                ))->render()
            ]);
        }


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
                "full_width",
                "p9"
            ));
            return $pdf->download("p.pdf");
        } else {
            //send via email

        }


        return redirect()->route("generate_p9_step_7", ["code" => $request->code])->with([
            "success" => 1,
            "msg" => "Success",
        ]);
    }

    private function taxPreviewData(P9 $p9)
    {
        $kra_pin = $p9->kra_pin;

        $basic_income = $p9->basic_salary;
        $allowances = $p9->allowances()->sum("amount");
        $deductions = $p9->deductions()->sum("amount");

        $taxable_income = (new TaxHandler($p9))->taxableIncome();
        $total_tax = (new TaxHandler($p9))->totalTax();
        $personal_relief = (new TaxHandler($p9))->taxRelief();
        $tax_payable = $total_tax - $personal_relief;

        $total_other_income_amount = $p9->incomes()->sum("amount");
        $total_taxable_other_income = $p9->incomes->sum(function ($income) {
            return $income->amount - $income->expense_amount;
        });
        $total_individual_income_tax = (new TaxHandler($p9))->calculateTaxAmount($total_taxable_other_income);
        $total_individual_income_tax = ($total_individual_income_tax > $personal_relief ? ($total_individual_income_tax - $personal_relief) : 0);
        $total_withholding_tax = $p9->incomes->sum(function ($income) {
            if (empty($income->withholding_tax) && $income->withholding_tax <= 0)
                return 0;
            return $income->amount * (16 / 100) * ($income->withholding_tax / 100);
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

    public function customizeBasicSalary(Request $request)
    {
        $p9 = P9::whereCode($request->code)->firstOrFail();


        if ($request->isMethod("POST")) {

            foreach (range(0, 11) as $item) {

                $month_name = now()->copy()->startOfYear()->addMonths($item)->monthName;

                $month = $p9->monthSalaries()->updateorcreate([
                    "month_name" => $month_name,
                ]);

//                if ($month->amount == 0)
                $month->update([
                    "amount" => round($request->amount / 12, 2)
                ]);

            }

            return view("tax_return.customize_basic_salary", [
                "salaries" => $p9->monthSalaries,
            ]);
        }

        foreach ($request->basic_salary as $month => $amount) {
            $p9->monthSalaries()->updateorcreate([
                "month_name" => $month
            ], [
                "amount" => $request->basic_salary[$month],
                "allowance" => $request->allowance[$month],
                "deduction" => $request->deduction[$month],
            ]);
        }
        $p9->update([
            "basic_salary" => $p9->monthSalaries()->sum("amount")
        ]);

        return back()->with([
            "success" => 1,
            "msg" => "Successfully customized basic salary",
        ]);

    }

    public function taxPreview(Request $request)
    {
        $p9 = P9::whereCode($request->code)->firstOrFail();

        if ($request->isMethod("GET")) {

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
                "p9"

            ));
        }

        parse_str($request->data, $data);

        $p9->update([
            "should_pay_nhif" => boolval($data['should_pay_nhif'] ?? false),
            "should_pay_nssf" => boolval($data['should_pay_nssf'] ?? false),
        ]);

        //delete deductions and allowances and incomces
        $p9->allowances()->delete();
        $p9->deductions()->delete();
        $p9->incomes()->delete();

        $index = 0;
        if (isset($data['allowance_amount']))
            foreach ($data['allowance_amount'] as $allowance_amount) {

                if (!empty($allowance_amount) && $allowance_amount > 0) {
                    $p9->allowances()->create([
                        "name" => $data['allowance_name'][$index],
                        "amount" => $allowance_amount,
                    ]);
                }

                $index += 1;
            }
        $index = 0;
        if (isset($data['deduction_amount']))
            foreach ($data['deduction_amount'] as $deduction_amount) {

                if (!empty($deduction_amount) && $deduction_amount > 0) {
                    $p9->deductions()->create([
                        "name" => $data['deduction_name'][$index],
                        "amount" => $deduction_amount,
                    ]);
                }

                $index += 1;
            }
        $index = 0;
        if (isset($data['income_amount']))
            foreach ($data['income_amount'] as $income_amount) {

                if (!empty($income_amount) && $income_amount > 0) {
                    $p9->incomes()->create([
                        "name" => $data['income_name'][$index],
                        "amount" => $income_amount,
                        "expense_amount" => doubleval($data['income_expense_amount'][$index]),
                        "withholding_tax" => doubleval($data['withholding_tax'][$index]),
                    ]);
                }

                $index += 1;
            }

        $nhif = $p9->should_pay_nhif ? $this->calculateNhif($p9->basic_salary) : 0;
        $nssf = $p9->should_pay_nssf ? array_sum($this->calculateNssf($p9->basic_salary)) : 0;

        $p9->update(compact("nhif", "nssf"));
    }

    public function calculateNhif($grossSalary)
    {
        if ($grossSalary <= 5999) {
            return 150;
        } elseif ($grossSalary <= 7999) {
            return 300;
        } elseif ($grossSalary <= 11999) {
            return 400;
        } elseif ($grossSalary <= 14999) {
            return 500;
        } elseif ($grossSalary <= 19999) {
            return 600;
        } elseif ($grossSalary <= 24999) {
            return 750;
        } elseif ($grossSalary <= 29999) {
            return 850;
        } elseif ($grossSalary <= 34999) {
            return 900;
        } elseif ($grossSalary <= 39999) {
            return 950;
        } elseif ($grossSalary <= 44999) {
            return 1000;
        } elseif ($grossSalary <= 49999) {
            return 1100;
        } elseif ($grossSalary <= 59999) {
            return 1200;
        } elseif ($grossSalary <= 69999) {
            return 1300;
        } elseif ($grossSalary <= 79999) {
            return 1400;
        } elseif ($grossSalary <= 89999) {
            return 1500;
        } elseif ($grossSalary <= 99999) {
            return 1600;
        }
        return 1700;
    }

    public function calculateNssf($grossSalary): array
    {
        if ($grossSalary < 3000)
            return [0, 0];

        $t1 = $t2 = 0;

        $t1 = min($grossSalary * 6 / 100, 360);

        if ($grossSalary > 6000)
            $t2 = min(($grossSalary - 6000) * 6 / 100, 720);

        return [$t1, $t2];
    }

    public function sendEmail(Request $request)
    {
        $p9 = P9::whereCode($request->code)->firstOrFail();

        $user = User::first();


        if (empty($p9->transaction_code) || empty($p9->amount_paid))
            return back()->with([
                "success" => 0,
                "msg" => "Please make payment before downloading",
            ]);

        /*(new User())->forceFill([
            "email" => $request->email,
            "name" => "Client",
        ])*/

        $user->notify(new SendP9Notification($p9));

//        $p9->update([
//            "link_expires_at" => now()->addMonth()
//        ]);

        return back()->with([
            "success" => 1,
            "msg" => "Successfully sent to email",
        ]);
    }

    public function downloadP9($id)
    {
        $p9 = P9::whereCode($id)->firstOrFail();

        $name = $p9->name;
        $pin = $p9->pin;
        $segment2 = "download";
        return view("tax_return.download_p9", [
            "table" => view("tax_return.p9_export_table", compact(
                "p9", "name", "pin"))
        ], compact("segment2"));


    }
}
