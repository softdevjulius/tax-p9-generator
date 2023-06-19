<?php

namespace App\Http\Controllers;

use App\Models\P9;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function home()
    {
        $booking_revenue = P9::where("account_type","corporate")->sum("amount");
        $p9_revenue = P9::where("account_type","!=","corporate")->sum("amount");
        $booking_count = P9::where("account_type","corporate")->count();
        return view("admin.home",compact("booking_count","booking_revenue","p9_revenue"));

    }

    public function payment()
    {
        $payments = P9::query()->latest("id")->get();

        return view("admin.payment",compact("payments"));
    }

    public function paymentDetail($id)
    {
        $payment = P9::findOrFail(decrypt($id));
        $booking_revenue = 100;

        return view("admin.payment_view",compact("payment","booking_revenue"));
    }
}
