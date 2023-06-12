@extends("tax_return.generate_p9")

@section("content")

    <form action="{{route("generate_p9_step_6")}}" method="post">
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
                    <input type="number" required class="form-control form-control-solid disabled" placeholder=""
                           name="amount" readonly disabled value="{{get_bill_amount()}}"/>
                    <input type="hidden" name="amount" value="1">
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
                <a href="{{route("generate_p9_step_3",['code' => request()->code])}}" type="button" class="btn btn-lg btn-light-primary me-3">
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
                <button type="submit" class="btn btn-lg btn-primary">Make Payment
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
                </button>
            </div>


        </div>

    </form>

@stop


@section("js")
    <script src="https://js.pusher.com/7.2/pusher.min.js"></script>

    <script>
        $(function (){

            Pusher.logToConsole = true;

            var pusher = new Pusher('bbe625b7fa2a9d48f6b0', {
                cluster: 'ap2'
            });

            var channel = pusher.subscribe("mpesa-channel-{{request()->code}}");
            channel.bind('mpesa-payment', function(data) {
                // alert(JSON.stringify(data));

                toastr.success(data.message);

                window.location.href = "{{route("generate_p9_book_meeting",['code'=>request()->code])}}"
            });

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
