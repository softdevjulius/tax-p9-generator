<?php

namespace App\Http\Controllers;

use App\Models\P9;
use App\Models\Setting;
use Illuminate\Http\Request;

use PDF;
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

    public function showPaymentDetails($id)
    {
        return $this->paymentDetail(encrypt(base64_decode($id)));
    }

    public function paymentDetail($id,Request $request)
    {

        $payment = P9::findOrFail(decrypt(($id)));
        $booking_revenue = get_bill_amount();
        $name = $payment->name;
        $link = route("payment_show",['id'=>base64_encode($payment->id)]);

        if ($request->has("download-pdf")){
            $pdf = PDF::loadView('admin.payment_view', compact("payment","booking_revenue","name","link"));

            return $pdf->download('itsolutionstuff.pdf');
//            dd("closer");
        }

        return view("admin.payment_view",compact("payment","booking_revenue","name","link"));
    }

    public function settings()
    {
        $settings = Setting::all();
        return view("admin.settings.index",compact("settings"));
    }

    public function settingsUpdate($id,Request $request)
    {
        if ($request->isMethod("GET"))
            return view("admin.settings.add_edit",compact("id"));
//        $setting = Setting::whereId(decrypt($id))->firstOrFail();

        set_settings(Setting::LABEL['BILLED_AMOUNT'],$request->billed_amount);

        return back()->with([
            "success" => 1,
            "msg" => "Successfully updated settings",
        ]);
    }
}
