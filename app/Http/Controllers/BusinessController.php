<?php

namespace App\Http\Controllers;

use App\Models\P9;
use App\Models\p9Stream;
use App\Models\Stream;
use Illuminate\Http\Request;

class BusinessController extends Controller
{
    public function step2(Request $request)
    {
        if (!request()->has("code")) return redirect()->route("generate_p9_step_1");

        $p9 = P9::whereCode($request->code)->firstOrFail();

        if ($request->isMethod("GET"))
        {
            $streams = Stream::all();
            return view("tax_return.business.step2",compact("streams"));
        }

        $p9->update([
            "organization_name" => $request->name_of_organisation,
            "kra_pin" => $request->kra_pin,
        ]);

        Stream::whereIn("id",$request->stream)
            ->get()
            ->each(function ($stream)use($p9){

                p9Stream::updateOrCreate([
                    "name" => $stream->name,
                    "stream_id" =>$stream->id,
                    "p9_id" =>$p9->id,
                ],[
                    "name" => $stream->name,
                    "stream_id" =>$stream->id,
                    "p9_id" =>$p9->id,
                ]);
        });

        return redirect()->route("business_step_3",['code'=>$request->code]);
    }
    public function step3(Request $request)
    {
        if (!request()->has("code")) return redirect()->route("generate_p9_step_1");

        $p9 = P9::whereCode($request->code)->firstOrFail();

        if ($request->isMethod("GET"))
            return view("tax_return.business.step3",['streams' => $p9->streams]);

        foreach ($request->income as $index => $item) {
            p9Stream::where([
                "id" => $index
            ])->update([
               "amount" => $request->income[$index],
               "expense" => $request->expense[$index],
            ]);
        }

        return redirect()->route("business_step_4",['code' => $request->code])->with([
            "success" => 1,
            "msg" => "Success",
        ]);
    }
    public function step4(Request $request)
    {
        if (!request()->has("code")) return redirect()->route("generate_p9_step_1");

        $p9 = P9::whereCode($request->code)->firstOrFail();

        if ($request->isMethod("GET"))
            return view("tax_return.business.step4");

        $p9->update($request->only([
            "phone","amount"
        ]));


        return redirect()->route("business_step_5",['code' => $request->code])->with([
            "success" => 1,
            "msg" => "Success",
        ]);
    }
    public function step5(Request $request)
    {
        if (!request()->has("code")) return redirect()->route("generate_p9_step_1");

        $p9 = P9::whereCode($request->code)->firstOrFail();



        if ($request->isMethod("GET"))
            return view("tax_return.business.step5");

        return redirect()->route("business_step_6")->with([
            "success" => 1,
            "msg" => "Success",
        ]);
    }

    public function step6()
    {
        return view("tax_return.business.step6");
    }
}
