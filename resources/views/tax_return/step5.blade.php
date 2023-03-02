@extends("tax_return.generate_p9")

@section("content")

    <form action="{{route("generate_p9_step_5")}}" method="post">
        @csrf
        <input type="hidden" name="code" value="{{request()->code}}">

        <div class="current" data-kt-stepper-element="content">
            <!--begin::Wrapper-->
            <div class="w-100">


                <!--begin::Heading-->
                <div class="pb-8 pb-lg-10">
                    <!--begin::Title-->
                    <div class="fv-row mb-0">
                        <!--begin::Label-->
                        <label class="fs-6 fw-semibold form-label"> Email</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <input name="business_email"
                               id="email_to_address"
                               required
                               type="email"
                               class="form-control form-control-lg form-control-solid"
                               value="email@company.com"/>
                        <!--end::Input-->
                    </div>
                    <!--end::Title-->
                    <!--begin::Notice-->

                    <!--end::Notice-->
                </div>
                <div class="d-flex flex-stack">
                    <!--begin::Label-->
                    <button name="submit_action" type="submit" value="download_pdf" class="btn btn-lg btn-primary">
                        <span class="indicator-label" class="bi-cloud-download">Download PDF</span>
                    </button>



{{--                    <div class="row">--}}
{{--                        <div class="col col-4">--}}
{{--                            <button type="button" id="export_file" style="float: right !important;" class="btn btn-primary">Export xls</button>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                    <!--begin::Label-->
                    <button id="export_file" type="button" value="download_pdf" class="btn btn-lg btn-primary">
                        <span class="indicator-label" class="bi-cloud-download">Export Excel</span>
                    </button>
                    <!--begin::Label-->
                    <button data-id="send_email_btn" name="submit_action" type="button" value="send_to_email" class="btn btn-lg btn-success">
                        <span class="indicator-label" class="bi-cloud-download">Send to email</span>
                    </button>
                    <!--end::Label-->
                    <!--begin::Switch-->
{{--                    <label class="form-check form-switch form-check-custom form-check-solid">--}}
{{--                        <input class="form-check-input" type="checkbox" value="1"/>--}}
{{--                        <span class="form-check-label fw-semibold text-muted"> Send to Mail</span>--}}
{{--                    </label>--}}
                    <!--end::Switch-->

                </div>

                </br>
                </br>
                </br>
                </br>
                </br>
                <!--end::Heading-->
                <!--begin::Body-->
                <p> Disclaimer content</p>
                <!--end::Body-->
            </div>




            <!--end::Wrapper-->
        </div>


        <div class="d-flex flex-stack pt-15">
            <div class="mr-2">
                <a href="{{route('generate_p9_step_4',['code'=>request()->code])}}" type="button" class="btn btn-lg btn-light-primary me-3">
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

        </div>

    </form>


    <div class="table_export" style="display: none !important;">
        {!! $table !!}
    </div>

    <form style="display: none !important;" id="send_email" action="{{route("generate_p9_send_email",['code' => request()->code])}}" method="post">
        @csrf
        <label class="form-check form-switch form-check-custom form-check-solid">
            <input type="hidden" name="email" id="email_to">
            <input class="form-check-input" type="checkbox" value="1"/>
            <button id="send_email_btn" type="submit" class="form-check-label fw-semibold text-muted"> Send to Mail</button>
        </label>
    </form>

@stop


@section("js")
    <script src="{{asset("js/file_saver.js")}}"></script>
    <script src="{{asset("js/export_xlsx.js")}}"></script>
    <script src="{{asset("js/table_export.js")}}"></script>
    <script>
        $(function (){

            $("button[data-id=send_email_btn]").on('click',function(){
                $("#email_to").val($("#email_to_address").val());
                $("button#"+$(this).data("id")).trigger('click');
            })
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
            $("#billing2").prop("checked",true);

            $("#billing1, #billing2").on("change",function(){
                // alert($(this).val())

                $("#billing1, #billing2").prop('checked',false);
                $(this).prop('checked',true);

            })
        })
    </script>
@stop
