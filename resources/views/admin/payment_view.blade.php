@extends("admin.layout")
@section("content")
    <script src="//cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.debug.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


    <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
        <div class="row" style="margin: 20px !important;">
            <div class="col-xl-4">
                <!--begin::Statistics Widget 5-->
                <a href="" class="card bg-danger hoverable card-xl-stretch mb-xl-8">
                    <!--begin::Body-->
                    <div class="card-body">
													<span class="svg-icon svg-icon-white svg-icon-3x ms-n1">
														<svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                             xmlns="http://www.w3.org/2000/svg">
															<path
                                                                d="M21 10H13V11C13 11.6 12.6 12 12 12C11.4 12 11 11.6 11 11V10H3C2.4 10 2 10.4 2 11V13H22V11C22 10.4 21.6 10 21 10Z"
                                                                fill="currentColor"/>
															<path opacity="0.3"
                                                                  d="M12 12C11.4 12 11 11.6 11 11V3C11 2.4 11.4 2 12 2C12.6 2 13 2.4 13 3V11C13 11.6 12.6 12 12 12Z"
                                                                  fill="currentColor"/>
															<path opacity="0.3"
                                                                  d="M18.1 21H5.9C5.4 21 4.9 20.6 4.8 20.1L3 13H21L19.2 20.1C19.1 20.6 18.6 21 18.1 21ZM13 18V15C13 14.4 12.6 14 12 14C11.4 14 11 14.4 11 15V18C11 18.6 11.4 19 12 19C12.6 19 13 18.6 13 18ZM17 18V15C17 14.4 16.6 14 16 14C15.4 14 15 14.4 15 15V18C15 18.6 15.4 19 16 19C16.6 19 17 18.6 17 18ZM9 18V15C9 14.4 8.6 14 8 14C7.4 14 7 14.4 7 15V18C7 18.6 7.4 19 8 19C8.6 19 9 18.6 9 18Z"
                                                                  fill="currentColor"/>
														</svg>
														<div
                                                            class="text-white fw-bold fs-2 mb-2 mt-5">{{$payment->name}}</div>
													</span>
                        <!--end::Svg Icon-->
                        <div class="text-white fw-bold fs-2 mb-2 mt-5">Name</div>
                    </div>
                    <!--end::Body-->
                </a>
                <!--end::Statistics Widget 5-->
            </div>

            <div class="col-xl-4">
                <!--begin::Statistics Widget 5-->
                <a href="" class="card bg-danger hoverable card-xl-stretch mb-xl-8">
                    <!--begin::Body-->
                    <div class="card-body">
													<span class="svg-icon svg-icon-white svg-icon-3x ms-n1">
														<svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                             xmlns="http://www.w3.org/2000/svg">
															<path
                                                                d="M21 10H13V11C13 11.6 12.6 12 12 12C11.4 12 11 11.6 11 11V10H3C2.4 10 2 10.4 2 11V13H22V11C22 10.4 21.6 10 21 10Z"
                                                                fill="currentColor"/>
															<path opacity="0.3"
                                                                  d="M12 12C11.4 12 11 11.6 11 11V3C11 2.4 11.4 2 12 2C12.6 2 13 2.4 13 3V11C13 11.6 12.6 12 12 12Z"
                                                                  fill="currentColor"/>
															<path opacity="0.3"
                                                                  d="M18.1 21H5.9C5.4 21 4.9 20.6 4.8 20.1L3 13H21L19.2 20.1C19.1 20.6 18.6 21 18.1 21ZM13 18V15C13 14.4 12.6 14 12 14C11.4 14 11 14.4 11 15V18C11 18.6 11.4 19 12 19C12.6 19 13 18.6 13 18ZM17 18V15C17 14.4 16.6 14 16 14C15.4 14 15 14.4 15 15V18C15 18.6 15.4 19 16 19C16.6 19 17 18.6 17 18ZM9 18V15C9 14.4 8.6 14 8 14C7.4 14 7 14.4 7 15V18C7 18.6 7.4 19 8 19C8.6 19 9 18.6 9 18Z"
                                                                  fill="currentColor"/>
														</svg>
														<div
                                                            class="text-white fw-bold fs-2 mb-2 mt-5"> {{($payment->phone??"--")}}</div>
													</span>
                        <!--end::Svg Icon-->
                        <div class="text-white fw-bold fs-2 mb-2 mt-5">Phone</div>
                    </div>
                    <!--end::Body-->
                </a>
                <!--end::Statistics Widget 5-->
            </div>

            <div class="col-xl-4">
                <!--begin::Statistics Widget 5-->
                <a href="" class="card bg-danger hoverable card-xl-stretch mb-xl-8">
                    <!--begin::Body-->
                    <div class="card-body">
													<span class="svg-icon svg-icon-white svg-icon-3x ms-n1">
														<svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                             xmlns="http://www.w3.org/2000/svg">
															<path
                                                                d="M21 10H13V11C13 11.6 12.6 12 12 12C11.4 12 11 11.6 11 11V10H3C2.4 10 2 10.4 2 11V13H22V11C22 10.4 21.6 10 21 10Z"
                                                                fill="currentColor"/>
															<path opacity="0.3"
                                                                  d="M12 12C11.4 12 11 11.6 11 11V3C11 2.4 11.4 2 12 2C12.6 2 13 2.4 13 3V11C13 11.6 12.6 12 12 12Z"
                                                                  fill="currentColor"/>
															<path opacity="0.3"
                                                                  d="M18.1 21H5.9C5.4 21 4.9 20.6 4.8 20.1L3 13H21L19.2 20.1C19.1 20.6 18.6 21 18.1 21ZM13 18V15C13 14.4 12.6 14 12 14C11.4 14 11 14.4 11 15V18C11 18.6 11.4 19 12 19C12.6 19 13 18.6 13 18ZM17 18V15C17 14.4 16.6 14 16 14C15.4 14 15 14.4 15 15V18C15 18.6 15.4 19 16 19C16.6 19 17 18.6 17 18ZM9 18V15C9 14.4 8.6 14 8 14C7.4 14 7 14.4 7 15V18C7 18.6 7.4 19 8 19C8.6 19 9 18.6 9 18Z"
                                                                  fill="currentColor"/>
														</svg>
														<div
                                                            class="text-white fw-bold fs-2 mb-2 mt-5">{{$payment->email??"--"}}</div>
													</span>
                        <!--end::Svg Icon-->
                        <div class="text-white fw-bold fs-2 mb-2 mt-5">Email</div>
                    </div>
                    <!--end::Body-->
                </a>
                <!--end::Statistics Widget 5-->
            </div>
        </div>
        <div class="row" style="margin: 20px !important;">
            <div class="col-xl-4">
                <!--begin::Statistics Widget 5-->
                <a href="" class="card bg-danger hoverable card-xl-stretch mb-xl-8">
                    <!--begin::Body-->
                    <div class="card-body">
													<span class="svg-icon svg-icon-white svg-icon-3x ms-n1">
														<svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                             xmlns="http://www.w3.org/2000/svg">
															<path
                                                                d="M21 10H13V11C13 11.6 12.6 12 12 12C11.4 12 11 11.6 11 11V10H3C2.4 10 2 10.4 2 11V13H22V11C22 10.4 21.6 10 21 10Z"
                                                                fill="currentColor"/>
															<path opacity="0.3"
                                                                  d="M12 12C11.4 12 11 11.6 11 11V3C11 2.4 11.4 2 12 2C12.6 2 13 2.4 13 3V11C13 11.6 12.6 12 12 12Z"
                                                                  fill="currentColor"/>
															<path opacity="0.3"
                                                                  d="M18.1 21H5.9C5.4 21 4.9 20.6 4.8 20.1L3 13H21L19.2 20.1C19.1 20.6 18.6 21 18.1 21ZM13 18V15C13 14.4 12.6 14 12 14C11.4 14 11 14.4 11 15V18C11 18.6 11.4 19 12 19C12.6 19 13 18.6 13 18ZM17 18V15C17 14.4 16.6 14 16 14C15.4 14 15 14.4 15 15V18C15 18.6 15.4 19 16 19C16.6 19 17 18.6 17 18ZM9 18V15C9 14.4 8.6 14 8 14C7.4 14 7 14.4 7 15V18C7 18.6 7.4 19 8 19C8.6 19 9 18.6 9 18Z"
                                                                  fill="currentColor"/>
														</svg>
														<div
                                                            class="text-white fw-bold fs-2 mb-2 mt-5">{{$payment->kra_pin}}</div>
													</span>
                        <!--end::Svg Icon-->
                        <div class="text-white fw-bold fs-2 mb-2 mt-5">KRA PIN</div>
                    </div>
                    <!--end::Body-->
                </a>
                <!--end::Statistics Widget 5-->
            </div>

            <div class="col-xl-4">
                <!--begin::Statistics Widget 5-->
                <a href="" class="card bg-danger hoverable card-xl-stretch mb-xl-8">
                    <!--begin::Body-->
                    <div class="card-body">
													<span class="svg-icon svg-icon-white svg-icon-3x ms-n1">
														<svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                             xmlns="http://www.w3.org/2000/svg">
															<path
                                                                d="M21 10H13V11C13 11.6 12.6 12 12 12C11.4 12 11 11.6 11 11V10H3C2.4 10 2 10.4 2 11V13H22V11C22 10.4 21.6 10 21 10Z"
                                                                fill="currentColor"/>
															<path opacity="0.3"
                                                                  d="M12 12C11.4 12 11 11.6 11 11V3C11 2.4 11.4 2 12 2C12.6 2 13 2.4 13 3V11C13 11.6 12.6 12 12 12Z"
                                                                  fill="currentColor"/>
															<path opacity="0.3"
                                                                  d="M18.1 21H5.9C5.4 21 4.9 20.6 4.8 20.1L3 13H21L19.2 20.1C19.1 20.6 18.6 21 18.1 21ZM13 18V15C13 14.4 12.6 14 12 14C11.4 14 11 14.4 11 15V18C11 18.6 11.4 19 12 19C12.6 19 13 18.6 13 18ZM17 18V15C17 14.4 16.6 14 16 14C15.4 14 15 14.4 15 15V18C15 18.6 15.4 19 16 19C16.6 19 17 18.6 17 18ZM9 18V15C9 14.4 8.6 14 8 14C7.4 14 7 14.4 7 15V18C7 18.6 7.4 19 8 19C8.6 19 9 18.6 9 18Z"
                                                                  fill="currentColor"/>
														</svg>
														<div
                                                            class="text-white fw-bold fs-2 mb-2 mt-5">KES {{number_format($payment->basic_salary,2)}}</div>
													</span>
                        <!--end::Svg Icon-->
                        <div class="text-white fw-bold fs-2 mb-2 mt-5">Basic Salary</div>
                    </div>
                    <!--end::Body-->
                </a>
                <!--end::Statistics Widget 5-->
            </div>

            <div class="col-xl-4">
                <!--begin::Statistics Widget 5-->
                <a href="" class="card bg-danger hoverable card-xl-stretch mb-xl-8">
                    <!--begin::Body-->
                    <div class="card-body">
													<span class="svg-icon svg-icon-white svg-icon-3x ms-n1">
														<svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                             xmlns="http://www.w3.org/2000/svg">
															<path
                                                                d="M21 10H13V11C13 11.6 12.6 12 12 12C11.4 12 11 11.6 11 11V10H3C2.4 10 2 10.4 2 11V13H22V11C22 10.4 21.6 10 21 10Z"
                                                                fill="currentColor"/>
															<path opacity="0.3"
                                                                  d="M12 12C11.4 12 11 11.6 11 11V3C11 2.4 11.4 2 12 2C12.6 2 13 2.4 13 3V11C13 11.6 12.6 12 12 12Z"
                                                                  fill="currentColor"/>
															<path opacity="0.3"
                                                                  d="M18.1 21H5.9C5.4 21 4.9 20.6 4.8 20.1L3 13H21L19.2 20.1C19.1 20.6 18.6 21 18.1 21ZM13 18V15C13 14.4 12.6 14 12 14C11.4 14 11 14.4 11 15V18C11 18.6 11.4 19 12 19C12.6 19 13 18.6 13 18ZM17 18V15C17 14.4 16.6 14 16 14C15.4 14 15 14.4 15 15V18C15 18.6 15.4 19 16 19C16.6 19 17 18.6 17 18ZM9 18V15C9 14.4 8.6 14 8 14C7.4 14 7 14.4 7 15V18C7 18.6 7.4 19 8 19C8.6 19 9 18.6 9 18Z"
                                                                  fill="currentColor"/>
														</svg>
														<div
                                                            class="text-white fw-bold fs-2 mb-2 mt-5">{{$payment->account_type}}</div>
													</span>
                        <!--end::Svg Icon-->
                        <div class="text-white fw-bold fs-2 mb-2 mt-5">Account Type</div>
                    </div>
                    <!--end::Body-->
                </a>
                <!--end::Statistics Widget 5-->
            </div>
        </div>
        <!--begin::Content wrapper-->
        <div class="d-flex flex-column flex-column-fluid">
            <!--begin::Toolbar-->
            <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
                <!--begin::Toolbar container-->
                <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                    <!--begin::Page title-->
                    <a class="btn btn-primary pull-right" style="float: right !important;" href="mailto:?subject=Equinox {{$name}}!&body={{$link}}"> <i class="fa fa-share"></i> Share</a>
                    <a class="btn btn-primary pull-right" style="float: right !important;" href="{{route("payment_detail",['id'=>encrypt($payment->id),'download-pdf'=>1])}}" id="download_pdf"> <i class="fa fa-download"></i> Download PDF</a>

                    <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                        <!--begin::Title-->
                        <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                            Bookings</h1>
                        <!--end::Title-->
                        <!--begin::Breadcrumb-->
                        <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                            <!--begin::Item-->
                            <li class="breadcrumb-item text-muted">
                                <a href="{{route("home")}}" class="text-muted text-hover-primary">Home</a>
                            </li>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <li class="breadcrumb-item">
                                <span class="bullet bg-gray-400 w-5px h-2px"></span>
                            </li>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <li class="breadcrumb-item text-muted">Allowances</li>
                            <!--end::Item-->
                        </ul>
                        <!--end::Breadcrumb-->
                    </div>
                    <!--end::Page title-->
                    <!--begin::Actions-->
                    <!--end::Actions-->
                </div>
                <!--end::Toolbar container-->
            </div>
            <!--end::Toolbar-->
            <!--begin::Content-->
            <div id="kt_app_content" class="app-content flex-column-fluid">
                <!--begin::Content container-->
                <div id="kt_app_content_container" class="app-container container-xxl">
                    <!--begin::Card-->
                    <div class="card">
                        <!--begin::Card header-->
                        <div class="card-header border-0 pt-6">
                            <!--begin::Card title-->
                            <div class="card-title">
                                <!--begin::Search-->

                                <!--end::Search-->
                            </div>
                            <!--begin::Card title-->
                            <!--begin::Card toolbar-->
                            <div class="card-toolbar">
                                <!--begin::Toolbar-->
                                <div class="d-flex justify-content-end" data-kt-subscription-table-toolbar="base">
                                    <div class="menu menu-sub menu-sub-dropdown w-300px w-md-325px" data-kt-menu="true">
                                        <div class="separator border-gray-200"></div>
                                    </div>

                                </div>
                            </div>
                            <!--end::Card toolbar-->
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body pt-0">
                            <!--begin::Table-->
                            <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_subscriptions_table">
                                <!--begin::Table head-->
                                <thead>
                                <!--begin::Table row-->
                                <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                                    {{--<th class="w-10px pe-2">
                                        <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                            <input class="form-check-input" type="checkbox" data-kt-check="true" data-kt-check-target="#kt_subscriptions_table .form-check-input" value="1" />
                                        </div>
                                    </th>--}}
                                    <th class="min-w-125px">#</th>
                                    <th class="min-w-125px">Name</th>
                                    <th class="min-w-125px">Amount</th>
                                </tr>
                                <!--end::Table row-->
                                </thead>
                                <!--end::Table head-->
                                <!--begin::Table body-->
                                <tbody class="text-gray-600 fw-semibold">
                                @forelse($payment->allowances as $allowance)
                                    <tr>
                                        <!--begin::Customer=-->
                                        <td>
                                            #{{$loop->iteration}}
                                        </td>
                                        <td>
                                            {{$allowance->name}}
                                        </td>

                                        <!--end::Billing=-->
                                        <!--begin::Product=-->
                                        <td>KES {{number_format($allowance->amount,2)}}</td>
                                        <!--end::Product=-->
                                        <!--begin::Date=-->
                                    </tr>
                                @empty
                                @endforelse
                                </tbody>
                                <!--end::Table body-->
                            </table>
                            <!--end::Table-->
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Card-->
                    <!--begin::Modals-->
                    <!--begin::Modal - Adjust Balance-->
                    <!--end::Modal - New Card-->
                    <!--end::Modals-->
                </div>
                <!--end::Content container-->
            </div>
            <div id="kt_app_content" class="app-content flex-column-fluid">

                <!--begin::Content container-->
                <div id="kt_app_content_container" class="app-container container-xxl">
                    <div class="row">
                        <h2>Deductions</h2>
                    </div>
                    <br>
                    <div class="card">
                        <div class="card-header border-0 pt-6">
                            <!--begin::Card title-->
                            <div class="card-title">
                                <!--begin::Search-->

                                <!--end::Search-->
                            </div>
                            <!--begin::Card title-->
                            <!--begin::Card toolbar-->
                            <div class="card-toolbar">
                                <!--begin::Toolbar-->
                                <div class="d-flex justify-content-end" data-kt-subscription-table-toolbar="base">
                                    <div class="menu menu-sub menu-sub-dropdown w-300px w-md-325px" data-kt-menu="true">
                                        <div class="separator border-gray-200"></div>
                                    </div>

                                </div>
                            </div>
                            <!--end::Card toolbar-->
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body pt-0">
                            <!--begin::Table-->
                            <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_subscriptions_table">
                                <!--begin::Table head-->
                                <thead>
                                <!--begin::Table row-->
                                <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">

                                    <th class="min-w-125px">#</th>
                                    <th class="min-w-125px">Name</th>
                                    <th class="min-w-125px">Amount</th>
                                </tr>
                                <!--end::Table row-->
                                </thead>
                                <!--end::Table head-->
                                <!--begin::Table body-->
                                <tbody class="text-gray-600 fw-semibold">
                                @forelse($payment->deductions as $deduction)
                                    <tr>
                                        <!--begin::Checkbox-->
                                        <!--end::Checkbox-->
                                        <!--begin::Customer=-->
                                        <td>
                                            #{{$loop->iteration}}
                                        </td>
                                        <td>
                                            {{$deduction->name}}
                                        </td>
                                        <!--end::Billing=-->
                                        <!--begin::Product=-->
                                        <td>KES {{number_format($deduction->amount,2)}}</td>
                                        <!--end::Product=-->
                                    </tr>
                                @empty
                                @endforelse
                                </tbody>
                                <!--end::Table body-->
                            </table>
                            <!--end::Table-->
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Card-->
                    <!--begin::Modals-->
                    <!--begin::Modal - Adjust Balance-->
                    <!--end::Modal - New Card-->
                    <!--end::Modals-->
                </div>
                <!--end::Content container-->
            </div>
            <div id="kt_app_content" class="app-content flex-column-fluid">
                <!--begin::Content container-->
                <div id="kt_app_content_container" class="app-container container-xxl">
                    <!--begin::Card-->
                    <div class="row">
                        <h2>Incomes</h2>
                    </div>
                    <br>
                    <div class="card">
                        <!--begin::Card header-->
                        <div class="card-header border-0 pt-6">
                            <!--begin::Card title-->
                            <div class="card-title">
                                <!--begin::Search-->

                                <!--end::Search-->
                            </div>
                            <!--begin::Card title-->
                            <!--begin::Card toolbar-->
                            <div class="card-toolbar">
                                <!--begin::Toolbar-->
                                <div class="d-flex justify-content-end" data-kt-subscription-table-toolbar="base">
                                    <div class="menu menu-sub menu-sub-dropdown w-300px w-md-325px" data-kt-menu="true">
                                        <div class="separator border-gray-200"></div>
                                    </div>

                                </div>
                            </div>
                            <!--end::Card toolbar-->
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body pt-0">
                            <!--begin::Table-->
                            <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_subscriptions_table">
                                <!--begin::Table head-->
                                <thead>
                                <!--begin::Table row-->
                                <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">

                                    <th class="min-w-125px">#</th>
                                    <th class="min-w-125px">Name</th>
                                    <th class="min-w-125px">Amount</th>
                                    <th class="min-w-125px">Attachments</th>
                                    <th class="text-end min-w-70px">Actions</th>
                                </tr>
                                <!--end::Table row-->
                                </thead>
                                <!--end::Table head-->
                                <!--begin::Table body-->
                                <tbody class="text-gray-600 fw-semibold">
                                @forelse($payment->incomes as $income)
                                    <tr>

                                        <!--end::Checkbox-->
                                        <!--begin::Customer=-->
                                        <td>
                                            {{$loop->iteration}}
                                        </td>
                                        <!--end::Customer=-->
                                        <!--begin::Status=-->
                                        <td>
                                            <div class="badge badge-light-success">{{$income->name}}</div>
                                        </td>

                                        <td>KES {{number_format($income->amount,2)}}</td>
                                        <!--end::Product=-->
                                        <!--end::Action=-->
                                        <td>
                                            @forelse($income->files as $file)
                                                <a href="{{route("download_file",["path"=>($file->path)])}}"><i class="fa fa-download"></i> file #{{$loop->iteration}}</a>
                                            @empty
                                            @endforelse
                                        </td>
                                    </tr>
                                    @foreach($income->expenses as $expense)
                                        <tr>

                                            <!--end::Checkbox-->
                                            <!--begin::Customer=-->
                                            <td>
                                                --
                                            </td>
                                            <!--end::Customer=-->
                                            <!--begin::Status=-->
                                            <td>
                                                <div class="">Expense Name: {{$expense->expense_name}}</div>
                                            </td>
                                            <!--end::Customer=-->
                                            <!--begin::Status=-->
                                            <td>
                                                <div class="">Expense Amount: {{number_format($expense->expense_amount,2)}}</div>
                                            </td>


                                        </tr>
                                    @endforeach
                                @empty
                                @endforelse
                                </tbody>
                                <!--end::Table body-->
                            </table>
                            <!--end::Table-->
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Card-->
                    <!--begin::Modals-->
                    <!--begin::Modal - Adjust Balance-->
                    <!--end::Modal - New Card-->
                    <!--end::Modals-->
                </div>
                <!--end::Content container-->
            </div>
            <!--end::Content-->
        </div>
        <!--end::Content wrapper-->
        <!--begin::Footer-->
        <!--end::Footer-->
    </div>
    <script>

        var pdfdoc = new jsPDF();
        var specialElementHandlers = {
            "#ignoreContent":function(element,renderer){
                return true;
            }};

        $(document).ready(function(){

            // $("#download_pdf").on("click",function (){
            //
            //     pdfdoc.fromHTML($("#kt_app_main").html(),10,10,{
            //         "width":110,
            //         "elementHandlers":specialElementHandlers
            //     })
            //
            //     pdfdoc.save('first.pdf');
            // })

            // $(“#gpdf”).click(function(){
            //
            //     pdfdoc.fromHTML($(‘#PDFcontent’).html(), 10, 10, {
//
// ‘width’: 110,
//
// ‘elementHandlers’: specialElementHandlers
//
//             });
//
//                 pdfdoc.save(‘First.pdf’);

            // });
        });
    </script>
@stop
