<?php

namespace App\Http\Controllers;

use App\Models\P9;
use Illuminate\Http\Request;

class GenerateP9Controller extends Controller
{
//    public function __constructor()
//    {
//        if (\request()->has("code"))
//    }
    public function step1(Request $request)
    {
        if ($request->isMethod("GET")) return view("tax_return.step1");

        $p9 = P9::create([
            "account_type" => $request->account_type
        ]);

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

        if ($request->isMethod("GET")) return view("tax_return.step2");

        $p9 = P9::whereCode($request->code)->firstOrFail();

        $p9->update([
            "organisation_name" => $request->organisation_name,
            "kra_pin" => $request->kra_pin,
            "basic_salary" => $request->basic_salary,
            "duration" => $request->has("month") ? "month" : "year"
        ]);

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

        foreach ($request->allowance_name as $index => $allowance) {
            $p9->allowances()->create([
                "name" => $request->allowance_name[$index],
                "amount" => $request->allowance_amount[$index],
            ]);
        }

        foreach ($request->deduction_name as $index => $allowance) {
            $p9->deductions()->create([
                "name" => $request->deduction_name[$index],
                "amount" => $request->deduction_amount[$index],
            ]);
        }

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
            $pdf = \PDF::loadView("tax_return.p9_pdf", compact("p9"));
            return $pdf->download("p.pdf");
        } else {
            //send via email

        }


        return redirect()->route("generate_p9_step_6", ["code" => $request->code])->with([
            "success" => 1,
            "msg" => "Success",
        ]);
    }
}
