@extends("tax_return.generate_p9")

@section("content")

    <form action="{{route("generate_p9_step_4")}}" method="post">
        @csrf
        <input type="hidden" name="code" value="{{request()->code}}">

        <div class="current" data-kt-stepper-element="content">
            <!--begin::Wrapper-->
            <div class="w-100">
                <!--begin::Heading-->
                <div class="pb-10 pb-lg-15">
                    <!--begin::Title-->
                    <h2 class="fw-bold text-dark">Billing Details</h2>
                    <!--end::Title-->
                    <!--begin::Notice-->

                    <!--end::Notice-->
                </div>
                <!--end::Heading-->
                <!--begin::Input group-->
                <div class="d-flex flex-column mb-7 fv-row">
                    <!--begin::Label-->
                    <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                        <span class="required">Phone Number</span>
                        <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                           title="Enter yoiur phone and Press pay then check youur phone"></i>
                    </label>
                    <!--end::Label-->
                    <input type="text" class="form-control form-control-solid" placeholder=""
                           name="phone_number" required value=""/>
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="d-flex flex-column mb-7 fv-row">
                    <!--begin::Label-->
                    <label class="required fs-6 fw-semibold form-label mb-2">Amount</label>
                    <!--end::Label-->
                    <!--begin::Input wrapper-->
                    <input type="number" required class="form-control form-control-solid" placeholder=""
                           name="amount" value="100"/>
                    <!--end::Input wrapper-->
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->

                <!--end::Input group-->
                <!--begin::Input group-->

                <!--end::Input group-->
            </div>
            <!--end::Wrapper-->
        </div>


        <div class="d-flex flex-stack pt-15">
            <div class="mr-2">
                <button type="button" class="btn btn-lg btn-light-primary me-3">
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
                </button>
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

            $("#billing2").prop("checked",true);

            $("#billing1, #billing2").on("change",function(){
                // alert($(this).val())

                $("#billing1, #billing2").prop('checked',false);
                $(this).prop('checked',true);

            })
        })
    </script>
@stop



@section("others")

    <form class="my-auto pb-5" novalidate="novalidate" id="kt_create_account_form" action="{{route("generate_p9_step_3")}}" method="post">
        @csrf
        <!--begin::Step 1-->

        <!--end::Step 1-->
        <!--begin::Step 2-->
        <div class="" data-kt-stepper-element="content">
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
                    <div class="form-check form-check-custom form-check-solid">
                        <input class="form-check-input" type="checkbox" value="1" id="billing1"
                               name="year"
                               data-kt-settings-notification="email"/>
                        <label class="form-check-label ps-2" for="billing1"> Year</label>
                    </div>
                    </br>
                    <div class="form-check form-check-custom form-check-solid">
                        <input class="form-check-input" type="checkbox" value="" id="billing2"
                               name="year" required/>
                        <label class="form-check-label ps-2" for="billing2">Monthly</label>
                    </div>


                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="mb-10 fv-row">
                    <!--begin::Label-->
                    <label class="form-label mb-3">Name of Organisation</label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    <input type="text" class="form-control form-control-lg form-control-solid"
                           name="name_of_organisation" placeholder="" value=""/>
                    <!--end::Input-->
                </div>
                <div class="mb-10 fv-row">
                    <!--begin::Label-->
                    <label class="form-label mb-3">Personal KRA PIN</label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    <input type="text" class="form-control form-control-lg form-control-solid"
                           name="kra_pin" placeholder="" value=""/>
                    <!--end::Input-->
                </div>
                <div class="mb-10 fv-row">
                    <!--begin::Label-->
                    <label class="form-label mb-3">Basic Salary</label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    <input type="number" class="form-control form-control-lg form-control-solid"
                           name="basic_salary" placeholder="" value=""/>
                    <!--end::Input-->
                </div>

                <!--end::Input group-->
                <!--begin::Input group-->

                <!--end::Input group-->
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Step 2-->
        <!--begin::Step 3-->
        <div class="" data-kt-stepper-element="content">
            <!--begin::Wrapper-->
            <div class="w-100">
                <!--begin::Heading-->
                <div class="pb-10 pb-lg-12">
                    <!--begin::Title-->
                    <h2 class="fw-bold text-dark">Company Details</h2>
                    <!--end::Title-->
                    <!--begin::Notice-->

                    <!--end::Notice-->
                </div>
                <!--end::Heading-->
                <!--begin::Input group-->
                <div class="fv-row mb-10">
                    <!--begin::Label-->
                    <label class="form-label required"> Organisation Name </label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    <input name="business_name" class="form-control form-control-lg form-control-solid"
                           value=" "/>
                    <!--end::Input-->
                </div>
                <div class="fv-row mb-10">
                    <!--begin::Label-->
                    <label class="form-label required"> Organisation KRA PIN</label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    <input name="business_name" class="form-control form-control-lg form-control-solid"
                           value=" "/>
                    <!--end::Input-->
                </div>
                <div class="fv-row mb-10">
                    <!--begin::Label-->
                    <label class="form-label "> Allowances </label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    <input name="business_name" class="form-control form-control-lg form-control-solid"
                           value=" "/>
                    <!--end::Input-->
                </div>

                <div class="fv-row mb-10">
                    <!--begin::Label-->
                    <label class="form-label "> Deductions </label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    <input name="business_name" class="form-control form-control-lg form-control-solid"
                           value=" "/>
                    <!--end::Input-->
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->

                <!--end::Input group-->
                <!--begin::Input group-->

                <!--end::Input group-->
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Step 3-->
        <!--begin::Step 4-->
        <div class="" data-kt-stepper-element="content">
            <!--begin::Wrapper-->
            <div class="w-100">
                <!--begin::Heading-->
                <div class="pb-10 pb-lg-15">
                    <!--begin::Title-->
                    <h2 class="fw-bold text-dark">Billing Details</h2>
                    <!--end::Title-->
                    <!--begin::Notice-->

                    <!--end::Notice-->
                </div>
                <!--end::Heading-->
                <!--begin::Input group-->
                <div class="d-flex flex-column mb-7 fv-row">
                    <!--begin::Label-->
                    <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                        <span class="required">Phone Number</span>
                        <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                           title="Enter yoiur phone and Press pay then check youur phone"></i>
                    </label>
                    <!--end::Label-->
                    <input type="text" class="form-control form-control-solid" placeholder=""
                           name="card_name" value=""/>
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="d-flex flex-column mb-7 fv-row">
                    <!--begin::Label-->
                    <label class="required fs-6 fw-semibold form-label mb-2">Amount</label>
                    <!--end::Label-->
                    <!--begin::Input wrapper-->
                    <input type="number" class="form-control form-control-solid" placeholder=""
                           name="amount" value="100"/>
                    <!--end::Input wrapper-->
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->

                <!--end::Input group-->
                <!--begin::Input group-->

                <!--end::Input group-->
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Step 4-->
        <!--begin::Step 5-->
        <div class="" data-kt-stepper-element="content">
            <!--begin::Wrapper-->
            <div class="w-100">


                <!--begin::Heading-->
                <div class="pb-8 pb-lg-10">
                    <!--begin::Title-->
                    <div class="fv-row mb-0">
                        <!--begin::Label-->
                        <label class="fs-6 fw-semibold form-label "> Email</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <input name="business_email"
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
                    <button type="button" class="btn btn-lg btn-primary"
                            data-kt-stepper-action="Finish">
											<span class="indicator-label" class="bi-cloud-download">Download Draft
                                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr064.svg-->

                                                <!--end::Svg Icon--></span>


                    </button>
                    <!--end::Label-->
                    <!--begin::Switch-->
                    <label class="form-check form-switch form-check-custom form-check-solid">
                        <input class="form-check-input" type="checkbox" value="1"/>
                        <span class="form-check-label fw-semibold text-muted"> Send to Mail</span>
                    </label>
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

    </form>
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
