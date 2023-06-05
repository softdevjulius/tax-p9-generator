@extends("tax_return.generate_p9")

@section("content")

    <div class="row">
        <form class="" id="tax_record_form" style="width: 60% !important;" action="{{route("generate_p9_step_3")}}" method="post">
            @csrf
            <input type="hidden" name="code" value="{{request()->code}}">

            <div class="current" data-kt-stepper-element="content">
                <!--begin::Wrapper-->

                <!--end::Wrapper-->
            </div>




        </form>



    </div>

    <form action="{{route("generate_p9_step_4")}}" class="" method="post">
        <div class="col-md-12 row" style="width: 100% !important;">
            @csrf
            <input type="hidden" name="code" value="{{request()->code}}">

            <div class="col-md-6">
                <!--begin::Label-->
                <label id="pin" class="form-label mb-3">PIN</label>

                <!--begin::Input-->
                <input type="text" class="form-control form-control-lg form-control-solid"
                       name="pin" value="{{$p9->kra_pin}}" required placeholder=""/>
                <!--end::Input-->
            </div>


            <div class="col-md-6">
                <!--begin::Label-->
                <label id="return_type" class="form-label mb-3">Return Type</label>
                <!--begin::Input-->
                <select name="pin" class="form-control" id="pin">
                    <option value="original">Original</option>
                    <option value="amended">Amended</option>
                </select>
                <!--end::Input-->
            </div>




        </div>

        <div class="row col-md-12" style="width: 100% !important;">
            <div class="col-md-6">
                <!--begin::Label-->
                <label class="form-label mb-3">Return Period From</label>
                <!--end::Label-->
                <!--begin::Input-->
                <select name="period_from" class="form-control" id="period_from">
                    @forelse(range(($period = now()->copy()->subYear())->format("Y"),$period->addYears(3)->format("Y")) as $year)
                        <option value="{{$year}}">{{$year}}</option>
                    @empty
                    @endforelse
                </select>
                <!--end::Input-->
            </div>

            <div class="col-md-6">
                <!--begin::Label-->
                <label class="form-label mb-3">Return Period To</label>
                <!--end::Label-->
                <!--begin::Input-->
                <select name="period_to" class="form-control" id="period_to">
                    @forelse(range(($period = now()->copy()->subYear())->format("Y"),$period->addYears(3)->format("Y")) as $year)
                        <option value="{{$year}}">{{$year}}</option>
                    @empty
                    @endforelse
                </select>
                <!--end::Input-->
            </div>

        </div>
        <br>
        <div class="row col-md-12" style="width: 100% !important;">

            <div class="col-md-6">
                <input class="form-check-input" type="checkbox" value="1" name="has_other_income" id="has_other_income"
                       data-kt-settings-notification="has_other_income"/>
                <label class="form-check-label ps-2" for="has_other_income">Other income apart from employment income?</label>
            </div>

            <div class="col-md-6">
                <input class="form-check-input" type="checkbox" value="1" name="has_partnership_income" id="has_partnership_income"
                       data-kt-settings-notification="has_partnership_income"/>
                <label class="form-check-label ps-2" for="has_partnership_income"> Do you have partnership income?</label>
            </div>

        </div>
        <br>
        <div class="row col-md-12" style="width: 100% !important;">

            <div class="col-md-6">
                <input class="form-check-input" type="checkbox" value="1" name="has_estate_trust_income" id="has_estate_trust_income"
                       data-kt-settings-notification="has_estate_trust_income"/>
                <label class="form-check-label ps-2" for="has_estate_trust_income">Have estate trust income?</label>
            </div>

            <div class="col-md-6">
                <input class="form-check-input" type="checkbox" value="1" name="has_employer_car" id="has_employer_car"
                       data-kt-settings-notification="has_employer_car"/>
                <label class="form-check-label ps-2" for="has_employer_car">Has your employer provided you with a car?</label>
            </div>

        </div>

        <br>
        <div class="row col-md-12" style="width: 100% !important;">

            <div class="col-md-6">
                <input class="form-check-input" type="checkbox" value="1" name="has_mortgage" id="has_mortgage"
                       data-kt-settings-notification="has_mortgage"/>
                <label class="form-check-label ps-2" for="has_mortgage">Do you have a mortgage?</label>
            </div>

            <div class="col-md-6">
                <input class="form-check-input" type="checkbox" value="1" name="has_home_ownership_plan" id="has_home_ownership_plan"
                       data-kt-settings-notification="has_home_ownership_plan"/>
                <label class="form-check-label ps-2" for="has_home_ownership_plan">Do you have home ownership savings plan?</label>
            </div>

        </div>

        <br>
        <div class="row col-md-12" style="width: 100% !important;">

            <div class="col-md-6">
                <input class="form-check-input" type="checkbox" value="1" name="has_life_insurance_policy" id="has_life_insurance_policy"
                       data-kt-settings-notification="has_life_insurance_policy"/>
                <label class="form-check-label ps-2" for="has_life_insurance_policy">Do you have a life insurance policy?</label>
            </div>

            <div class="col-md-6">
                <input class="form-check-input" type="checkbox" value="1" name="has_commercial_vehicle" id="has_commercial_vehicle"
                       data-kt-settings-notification="has_commercial_vehicle"/>
                <label class="form-check-label ps-2" for="has_commercial_vehicle">Do you have a commercial vehicle?</label>
            </div>

        </div>

        <br>
        <div class="row col-md-12" style="width: 100% !important;">

            <div class="col-md-6">
                <input class="form-check-input" type="checkbox" value="1" name="has_foreign_income" id="has_foreign_income"
                       data-kt-settings-notification="has_foreign_income"/>
                <label class="form-check-label ps-2" for="has_foreign_income">Do you earn any income from foreign country?</label>
            </div>

            <div class="col-md-6">
                <input class="form-check-input" type="checkbox" value="1" name="has_disability_exemption_certificate" id="has_disability_exemption_certificate"
                       data-kt-settings-notification="has_disability_exemption_certificate"/>
                <label class="form-check-label ps-2" for="has_disability_exemption_certificate">Have you been issued the Exemption Certificate for disability?</label>
            </div>

        </div>

        <br>
        <div class="row col-md-12" style="width: 100% !important;">

            <div class="col-md-6">
                <input class="form-check-input" type="checkbox" value="1" name="declare_wife_income" id="declare_wife_income"
                       data-kt-settings-notification="declare_wife_income"/>
                <label class="form-check-label ps-2" for="declare_wife_income">Do you want to declare your wife's income?</label>
            </div>

            <div class="col-md-6">
                <!--begin::Label-->
                <label id="pin" class="form-label mb-3">Wife's PIN</label>

                <!--begin::Input-->
                <input type="text" class="form-control form-control-lg form-control-solid"
                       name="wife_pin" value="" required placeholder=""/>
                <!--end::Input-->
            </div>

        </div>


        <br>
        <div class="row col-md-12" style="width: 100% !important;">

            <div class="col-md-6">
                <input class="form-check-input" type="checkbox" value="1" name="wife_has_other_income" id="wife_has_other_income"
                       data-kt-settings-notification="wife_has_other_income"/>
                <label class="form-check-label ps-2" for="wife_has_other_income">Does your wife has any other income apart from employment income?</label>
            </div>


            <div class="col-md-6">
                <input class="form-check-input" type="checkbox" value="1" name="wife_has_disability_exemption_certificate" id="wife_has_disability_exemption_certificate"
                       data-kt-settings-notification="wife_has_disability_exemption_certificate"/>
                <label class="form-check-label ps-2" for="wife_has_disability_exemption_certificate">Has your wife been issued with Exemption certificate for disability?</label>
            </div>

        </div>

        <div class="row">
            <div class="col-md-4 offset-md-8">
                <br>
                <button class="btn btn-primary pull-right" style="float: right !important;">Next</button>

            </div>
        </div>

    </form>


@stop


@section("js")
    <script src="{{asset("js/file_saver.js")}}"></script>
    <script src="{{asset("js/export_xlsx.js")}}"></script>
    <script src="{{asset("js/table_export.js")}}"></script>
    <script>
        $(function (){

            const export_file = function (){
                // var exportType = 'csv';
                $('table').tableExport({type:'csv'});
                // $('#dataTable').tableExport({
                //     type : exportType,
                //     escape : 'false',
                //     ignoreColumn: []
                // });
            }

            $("#export_file").on("click",function (){
                export_file()
            })

            const update_tax_records = () =>{
                const data = $("#tax_record_form").serialize()
                $.ajax({
                    url:"{{route("generate_p9_tax_preview")}}",
                    method:"post",
                    data:{
                        data,
                        _token: "{{csrf_token()}}",
                        code:"{{request()->code}}"
                    },
                    success:function (data){
                        console.info(data)
                        load_tax_preview()
                    },
                    error:function (e){
                        console.log(e)
                        load_tax_preview()
                    }
                })
            }

            update_tax_records();

            const load_tax_preview = () =>{
                $.ajax({
                    url:"{{route('generate_p9_tax_preview',['code'=>request()->code])}}",
                    method:'get',
                    data:{
                        '_token':"{{csrf_token()}}"
                    },
                    success:function (data){

                        console.info(data)
                        $("#tax_calculation_preview").html(data)
                    },
                    error:function (e){
                        console.log(e)
                    }
                })
            }

            load_tax_preview();

            $("a.add_other_income_deductions").on("click",function (){
               $("div.other_incomes").append(`<div class="row other_income_">
                            <div class="row">
                                <div class="col">
                                    <div class="fv-row mb-10">
                                        <!--begin::Label-->
                                        <label class="form-label "> Income Name </label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input name="income_name[]" class="form-control form-control-lg form-control-solid"
                                               value=""/>
                                        <!--end::Input-->
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="fv-row mb-10">
                                        <!--begin::Label-->
                                        <label class="form-label "> Income Amount </label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input name="income_amount[]" type="number" step="0.01" class="taxable form-control form-control-lg form-control-solid"
                                               value=""/>
                                        <!--end::Input-->
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="fv-row mb-10">
                                        <!--begin::Label-->
                                        <label class="form-label ">Expenses Amount</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input name="income_expense_amount[]" type="number" step="0.01" class="taxable form-control form-control-lg form-control-solid"
                                               value=""/>
                                        <!--end::Input-->
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="fv-row mb-10">
                                        <!--begin::Label-->
                                        <label class="form-label "> Withholding Tax (in %)</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input name="withholding_tax[]" type="number" step="0.01" class="taxable form-control form-control-lg form-control-solid"
                                               value=""/>
                                        <!--end::Input-->
                                    </div>
                                </div>
                        <div class="w-25 mt-10">
                           <button type="button" class="btn btn-sm btn-danger btn-circle delete_income"><i class="fa fa-trash fa-3x"></i></button>

                       </div>
                            </div>
                        </div>`)
            });

            $(document).on("click","button.remove_allowance, button.remove_deduction",function(){
                $(this).closest("div.row").remove()
                update_tax_records()
            })
            $(document).on("click","button.delete_income",function (){
                $(this).closest("div.other_income_").remove()
                update_tax_records()
            })
            $(document).on("input","input.taxable",function (){
                update_tax_records()
            })

            $("button.add_allowance").on("click",function (){
                const html_to_append = `<div class="row">
                       <div class="col">
                           <div class="fv-row mb-10">
                               <!--begin::Label-->
                               <label class="form-label "> Name </label>
                               <!--end::Label-->
                               <!--begin::Input-->
                               <input name="allowance_name[]" class="form-control form-control-lg form-control-solid"
                                      value=""/>
                               <!--end::Input-->
                           </div>
                       </div>

                       <div class="col">
                           <div class="fv-row mb-10">
                               <!--begin::Label-->
                               <label class="form-label ">  Amount </label>
                               <!--end::Label-->
                               <!--begin::Input-->
                               <input type="number" step="0.01" name="allowance_amount[]" class="taxable form-control form-control-lg form-control-solid"
                                      value=""/>
                               <!--end::Input-->
                           </div>
                       </div>
                       <div class="w-25 mt-10">
                           <button type="button" class="btn btn-sm btn-danger btn-circle remove_allowance"><i class="fa fa-trash fa-3x"></i></button>

                       </div>
                   </div>`;
                $("div.allowances").append(html_to_append)
            });

            $("button.add_deduction").on("click",function (){
                const html_to_append = `<div class="row">
                        <div class="col">
                            <div class="fv-row mb-10">
                                <!--begin::Label-->
                                <label class="form-label "> Name </label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input name="deduction_name[]" class="form-control form-control-lg form-control-solid"
                                       value=""/>
                                <!--end::Input-->
                            </div>
                        </div>

                        <div class="col">
                            <div class="fv-row mb-10">
                                <!--begin::Label-->
                                <label class="form-label "> Amount </label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="number" step="0.01" name="deduction_amount[]" class="taxable form-control form-control-lg form-control-solid"
                                       value=""/>
                                <!--end::Input-->
                            </div>
                        </div>
                        <div class="w-25 mt-10">
                            <button type="button" class="btn btn-sm btn-danger btn-circle remove_deduction"><i class="fa fa-trash fa-3x"></i></button>

                        </div>
                    </div>`;

                $("div.deductions").append(html_to_append)
            })

            $("#billing2").prop("checked",true);

            $("#nhif, #nssf").on("change",function(){
                update_tax_records()
            })
            $("#billing1, #billing2").on("change",function(){
                // alert($(this).val())

                $("#billing1, #billing2").prop('checked',false);
                $(this).prop('checked',true);

            })
        })
    </script>
@stop



@section("footer_button")
    <div>
        <button type="button" class="btn btn-lg btn-primary">
											<span class="indicator-label">Pay
                                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr064.svg-->
											<span class="svg-icon svg-icon-4 ms-2">
												<svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
													<rect opacity="0.5" x="18" y="13" width="13" height="2" rx="1"
                                                          transform="rotate(-180 18 13)" fill="currentColor"/>
													<path
                                                        d="M15.4343 12.5657L11.25 16.75C10.8358 17.1642 10.8358 17.8358 11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25L18.2929 12.7071C18.6834 12.3166 18.6834 11.6834 18.2929 11.2929L12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75C10.8358 6.16421 10.8358 6.83579 11.25 7.25L15.4343 11.4343C15.7467 11.7467 15.7467 12.2533 15.4343 12.5657Z"
                                                        fill="currentColor"/>
												</svg>
											</span>
                                                <!--end::Svg Icon--></span>
            <span class="indicator-progress">Please wait...
											<span
                                                class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
        </button>
        <button type="submit" class="btn btn-lg btn-primary">
            Continue
            <!--begin::Svg Icon | path: icons/duotune/arrows/arr064.svg-->
            <span class="svg-icon svg-icon-4 ms-1">
											<svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
												<rect opacity="0.5" x="18" y="13" width="13" height="2" rx="1"
                                                      transform="rotate(-180 18 13)" fill="currentColor"/>
												<path
                                                    d="M15.4343 12.5657L11.25 16.75C10.8358 17.1642 10.8358 17.8358 11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25L18.2929 12.7071C18.6834 12.3166 18.6834 11.6834 18.2929 11.2929L12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75C10.8358 6.16421 10.8358 6.83579 11.25 7.25L15.4343 11.4343C15.7467 11.7467 15.7467 12.2533 15.4343 12.5657Z"
                                                    fill="currentColor"/>
											</svg>
										</span>
            <!--end::Svg Icon--></button>
    </div>

@stop
