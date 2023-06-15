@extends("tax_return.generate_p9")

@section("content")

    <div class="row">
        <form class="" id="tax_record_form" style="width: 60% !important;" action="{{route("generate_p9_step_3")}}"
              method="post">
            @csrf
            <input type="hidden" name="code" value="{{request()->code}}">

            <div class="current" data-kt-stepper-element="content">
                <!--begin::Wrapper-->
                <div class="w-100">
                    <!--begin::Heading-->

                    <!--end::Heading-->
                    <!--begin::Input group-->


                    <div class="row">
                        <div class="full">
                            <h3>Statutory Deductions:</h3>
                        </div>
                    </div>
                    <div class="row">

                        <div class="w-25">
                            <label for="nhif">NHIF</label>
                            <input id="nhif" type="checkbox" name="should_pay_nhif" checked>
                        </div>
                        <div class="w-25">
                            <label for="nssf">NSSF</label>
                            <input id="nssf" type="checkbox" name="should_pay_nssf" checked>
                        </div>
                    </div>
                    <br>
                    <br>

                    <div class="row">
                        <div class="w-75">
                            <h3>Non-Cash Benefits: </h3>
                        </div>
                        <div class="w-25">
                            <button type="button" class="btn btn-sm btn-primary btn-circle add_allowance"><i
                                    class="fa fa-plus fa-3x"></i></button>
                        </div>
                    </div>

                    <div class="allowances">
                        {{--                        <div class="row">--}}
                        {{--                            <div class="col">--}}
                        {{--                                <div class="fv-row mb-10">--}}
                        {{--                                    <!--begin::Label-->--}}
                        {{--                                    <label class="form-label "> Allowances Name </label>--}}
                        {{--                                    <!--end::Label-->--}}
                        {{--                                    <!--begin::Input-->--}}
                        {{--                                    <input name="allowance_name[]" class="form-control form-control-lg form-control-solid"--}}
                        {{--                                           value=""/>--}}
                        {{--                                    <!--end::Input-->--}}
                        {{--                                </div>--}}
                        {{--                            </div>--}}

                        {{--                            <div class="col">--}}
                        {{--                                <div class="fv-row mb-10">--}}
                        {{--                                    <!--begin::Label-->--}}
                        {{--                                    <label class="form-label "> Allowances Amount </label>--}}
                        {{--                                    <!--end::Label-->--}}
                        {{--                                    <!--begin::Input-->--}}
                        {{--                                    <input name="allowance_amount[]" class="form-control form-control-lg form-control-solid"--}}
                        {{--                                           value=""/>--}}
                        {{--                                    <!--end::Input-->--}}
                        {{--                                </div>--}}
                        {{--                            </div>--}}
                        {{--                            <div class="w-25 mt-10">--}}
                        {{--                                <button type="button" class="btn btn-sm btn-primary btn-circle add_allowance"><i class="fa fa-plus fa-3x"></i></button>--}}

                        {{--                            </div>--}}
                        {{--                        </div>--}}
                    </div>

                    <br>
                    <div class="clearfix"></div>


                    <div class="row">
                        <div class="w-75">
                            <h3>Other Allowable Deductions:</h3>
                        </div>
                        <div class="w-25">
                            <button type="button" class="btn btn-sm btn-primary btn-circle add_deduction"><i
                                    class="fa fa-plus fa-3x"></i></button>
                        </div>
                    </div>
                    <div class="deductions">
                    </div>
                    <br>


                    <div class="w-100">
                        <!--begin::Title-->
                        <h2 class="fw-bold text-dark">Other Incomes and Deductions</h2>

                        <a href="javascript:void(0);" class="btn btn-link add_other_income_deductions"
                           style="text-decoration: underline; color: #1b459b"><i class="fa fa-plus"
                                                                                 style="color: #1b459b"></i>Add Other
                            Income</a>

                        <div class="other_incomes">

                        </div>
                        <br>

                    </div>


                </div>
                <!--end::Wrapper-->
            </div>


            <div class="d-flex flex-stack pt-15">
                <div class="mr-2">
                    <a href="{{route("generate_p9_step_2",['code' => request()->code])}}" type="button"
                       class="btn btn-lg btn-light-primary me-3">
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr063.svg-->
                        <span class="svg-icon svg-icon-4 me-1">
											<svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
												<rect opacity="0.5" x="6" y="11" width="13" height="2" rx="1"
                                                      fill="currentColor"/>
												<path
                                                    d="M8.56569 11.4343L12.75 7.25C13.1642 6.83579 13.1642 6.16421 12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75L5.70711 11.2929C5.31658 11.6834 5.31658 12.3166 5.70711 12.7071L11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25C13.1642 17.8358 13.1642 17.1642 12.75 16.75L8.56569 12.5657C8.25327 12.2533 8.25327 11.7467 8.56569 11.4343Z"
                                                    fill="currentColor"/>
											</svg>
										</span>
                        <!--end::Svg Icon-->Previous
                    </a>
                </div>

                <div>
                    <button type="button" class="btn btn-lg btn-primary" data-kt-stepper-action="submit">
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
                    <a href="{{route("generate_p9_step_4",['code' => request()->code])}}" type="submit"
                       class="btn btn-lg btn-warning">
                        Skip
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
                        <!--end::Svg Icon--></a>

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


            </div>

        </form>

        <div class="" style="width: 40% !important; position: sticky !important;" id="tax_calculation_preview">

        </div>
    </div>

    {{--    <div class="row">--}}
    {{--        <div class="col col-4">--}}
    {{--            <button type="button" id="export_file" style="float: right !important;" class="btn btn-primary">Export xls</button>--}}
    {{--        </div>--}}
    {{--    </div>--}}

@stop


@section("js")
    <script src="{{asset("js/file_saver.js")}}"></script>
    <script src="{{asset("js/export_xlsx.js")}}"></script>
    <script>
        $(function () {

            const export_file = function () {
                // var exportType = 'csv';
                $('table').tableExport({type: 'csv'});
                // $('#dataTable').tableExport({
                //     type : exportType,
                //     escape : 'false',
                //     ignoreColumn: []
                // });
            }

            $("#export_file").on("click", function () {
                export_file()
            })

            const update_tax_records = () => {
                const data = $("#tax_record_form").serialize()
                $.ajax({
                    url: "{{route("generate_p9_tax_preview")}}",
                    method: "post",
                    data: {
                        data,
                        _token: "{{csrf_token()}}",
                        code: "{{request()->code}}"
                    },
                    success: function (data) {
                        console.info(data)
                        load_tax_preview()
                    },
                    error: function (e) {
                        console.log(e)
                        load_tax_preview()
                    }
                })
            }

            update_tax_records();

            const load_tax_preview = () => {
                $.ajax({
                    url: "{{route('generate_p9_tax_preview',['code'=>request()->code])}}",
                    method: 'get',
                    data: {
                        '_token': "{{csrf_token()}}"
                    },
                    success: function (data) {

                        console.info(data)
                        $("#tax_calculation_preview").html(data)
                    },
                    error: function (e) {
                        console.log(e)
                    }
                })
            }

            load_tax_preview();

            $("a.add_other_income_deductions").on("click", function () {

                const item_number = $("div.other_income_").length;

                $("div.other_incomes").find("div.content-div").hide();


                $("div.other_incomes").append(`<div class="row other_income_">
                            <div class="collapsed">
                            <span style="float: right !important;"><i class="fa fa-chevron-down"></i></span>
                            </div>
                            <div class="content-div">
                            <div class="row">
                                <div class="col">
                                    <div class="fv-row mb-10">
                                        <!--begin::Label-->
                                        <label class="form-label "> Income Name </label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input name="income_name[${item_number}][]" class="form-control form-control-lg form-control-solid"
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
                                        <input name="income_amount[${item_number}][]" type="number" step="0.01" class="taxable form-control form-control-lg form-control-solid"
                                               value=""/>
                                        <!--end::Input-->
                                    </div>
                                </div>
                            </div>
                            <div class="expense_">
                               <div class="row">
                                <div class="col">
                                    <div class="fv-row mb-10">
                                        <!--begin::Label-->
                                        <label class="form-label ">Withholding Amount</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input name="income_expense_amount[${item_number}][]" type="number" step="0.01" class="taxable form-control form-control-lg form-control-solid"
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
                                        <input name="withholding_tax[${item_number}][]" type="number" step="0.01" class="taxable form-control form-control-lg form-control-solid"
                                               value=""/>
                                        <!--end::Input-->
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="fv-row mb-10">
                                        <!--begin::Label-->
                                        <label class="form-label ">Company Name</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input name="income_expense_company_name[${item_number}][]" type="text" class="taxable form-control form-control-lg form-control-solid"
                                               value=""/>
                                        <!--end::Input-->
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="fv-row mb-10">
                                        <!--begin::Label-->
                                        <label class="form-label "> Company PIN</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input name="income_expense_company_pin[${item_number}][]" type="text" class="taxable form-control form-control-lg form-control-solid"
                                               value=""/>
                                        <!--end::Input-->
                                    </div>
                            </div>
                        <div class="w-25 mt-10">
                           <button type="button" class="btn btn-sm btn-danger btn-circle delete_income"><i class="fa fa-trash fa-3x"></i></button>

                       </div>
                           <button data-value="${item_number}" type="button" class="btn btn-sm btn-primary btn-circle add_expense w-50"><i class="fa fa-plus fa-3x"></i> Add Expense</button>

                            </div>
                        </div>
                        </div>
                        </div>
                        </div><hr><br>`)
            });

            $(document).on("click", "button.remove_allowance, button.remove_deduction", function () {
                $(this).closest("div.row").remove()
                update_tax_records()
            })
            $(document).on("click", "button.delete_income", function () {
                $(this).closest("div.other_income_").remove()
                update_tax_records()
            })
            $(document).on("click","button.add_expense",function (){
                const item_number = ($(this).data("value"));
                $(this).closest("div.other_income_").find("div.expense_").append(`<div class="row expense_row">
                                <div class="col">
                                    <div class="fv-row mb-10">
                                        <!--begin::Label-->
                                        <label class="form-label ">Expense Name</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input name="expense_name[${item_number}][]" type="text" class="taxable form-control form-control-lg form-control-solid"
                                               value=""/>
                                        <!--end::Input-->
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="fv-row mb-10">
                                        <!--begin::Label-->
                                        <label class="form-label ">Expense Amount</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input name="expense_amount[${item_number}][]" type="number" step="0.01" class="taxable form-control form-control-lg form-control-solid"
                                               value=""/>
                                        <!--end::Input-->
                                    </div>
                                </div>
                                <div class="col">
                                    <button style="margin-top: 35px !important;" type="button" class="btn btn-danger delete_expense"><i class="fa fa-trash-alt"></i></button>
                                </div>

                            </div>`)
            })
            $(document).on("input", "input.taxable", function () {
                update_tax_records()
            })

            $("button.add_allowance").on("click", function () {
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

            $("button.add_deduction").on("click", function () {
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

            $("#billing2").prop("checked", true);

            $("#nhif, #nssf").on("change", function () {
                update_tax_records()
            })
            $("#billing1, #billing2").on("change", function () {
                // alert($(this).val())

                $("#billing1, #billing2").prop('checked', false);
                $(this).prop('checked', true);

            })
            $(document).on("click","button.delete_expense",function (){
                $(this).closest("div.expense_row").remove()
            })
            $(document).on("click","div.collapsed",function (){
                $(this).parent().find("div.content-div").toggle()
            })
        })
    </script>
    <script src="{{asset("js/table_export.js")}}"></script>
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
