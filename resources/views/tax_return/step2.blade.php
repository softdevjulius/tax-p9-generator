@extends("tax_return.generate_p9")

@section("content")

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document" id="body">

        </div>
    </div>

    <form action="{{route("generate_p9_step_2")}}" method="post">
        @csrf

        <!-- Button trigger modal -->


        <!-- Modal -->

        <input type="hidden" name="code" value="{{request()->code}}">
        <div class="current" data-kt-stepper-element="content">
            <!--begin::Wrapper-->
            <div class="w-100">

                <!--begin::Heading-->
                <div class="pb-10 pb-lg-15">
                    <!--begin::Title-->
                    <h2 class="fw-bold text-dark">Tax Details</h2>
                    <!--end::Title-->
                    <!--begin::Notice-->

                    <!--end::Notice-->
                </div>
                <!--end::Heading-->
                <!--begin::Input group-->
                <div class="mb-10 fv-row">

                    <label class="form-label mb-3" for="year">Select year</label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    <select name="year" class="form-control" id="year">
                        @forelse(range(2022,2025) as $year)
                            <option @if($p9->year == $year) selected @endif value="{{$year}}">{{$year}}</option>
                        @empty
                        @endforelse
                    </select>

                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="mb-10 fv-row">
                    <!--begin::Label-->
                    <label class="form-label mb-3">Your Name</label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    <input type="text" class="form-control form-control-lg form-control-solid"
                           name="name" required placeholder="" value="{{$p9->name}}"/>
                    <!--end::Input-->
                </div>
                <div class="mb-10 fv-row">
                    <!--begin::Label-->
                    <label class="form-label mb-3">Personal KRA PIN</label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    <input type="text" required class="form-control form-control-lg form-control-solid"
                           name="kra_pin" placeholder="" value="{{$p9->kra_pin}}"/>
                    <!--end::Input-->
                </div>
                <div class="mb-10 fv-row">
                    <!--begin::Label-->
                    <label class="form-label mb-3">Annual Basic Salary</label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    <div class="input-group mb-3">
                        <input required type="number" class="form-control form-control-lg form-control-solid"
                               name="basic_salary" id="basic_salary" placeholder="" value="{{$p9->basic_salary}}"/>
                        <div class="input-group-append">
                            <button type="button" id="customize_basic_salary" class="btn btn-primary"><i class="fa fa-cogs"></i> Customize</button>
                        </div>
                    </div>

                </div>

            </div>

            <!--end::Wrapper-->
        </div>
        <div class="d-flex flex-stack pt-15">
            <div class="mr-2">
                <a href="{{route("generate_p9_step_1",['code' => request()->code])}}" type="button" class="btn btn-lg btn-light-primary me-3">
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

@stop


@section("js")
    <script>
        $(function (){

            $("button#customize_basic_salary").on("click",function (){
                $("#exampleModal").modal("show");

                $("#body").html("<div style='text-align: center !important;'><i style='font-weight: bolder; font-size: 34px' class='fa fa-3x fa-spin fa-refresh'></i></div>")

                $.ajax({
                    url:"{{route("generate_p9_customize_basic_salary",['code' => request()->code])}}",
                    method:'POST',
                    data:{
                        _token:"{{csrf_token()}}",
                        amount:$("#basic_salary").val()
                    },
                    success:function (data){
                        $("#body").html(data)
                    },
                    error:function (e){
                        console.log(e)
                    }
                })
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
