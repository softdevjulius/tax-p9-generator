<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        return view("pages.home");
    }

    public function generateP9()
    {
        return redirect()->route("generate_p9_step_1");

        return view("tax_return.generate_p9");
    }

    public function payeCalculator(Request $request)
    {
        $results = "";

        if ($request->isMethod("GET"))
            return view("pages.paye_calculator",compact("results"));


        $tax = .3* ($request->gross_salary + $request->total_allowance - $request->total_deduction);

        $results = view("pages.results",[
            "gross_salary" => $request->gross_salary,
            "total_allowance" => $request->total_allowance,
            "total_deduction" => $request->total_deduction,
            "nssf" => $request->nssf,
            "tax" => $tax,
        ]);

        return view("pages.paye_calculator")->with([
            "results" => $results
        ]);
    }
}
