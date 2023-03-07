<!DOCTYPE html>
<!--
Author: Keenthemes
Product Name: Metronic - Bootstrap 5 HTML, VueJS, React, Angular. Laravel, Asp.Net Core, Ruby on Rails, Spring Boot, Blazor, Django, Express.js, Node.js, Flask Admin Dashboard Theme & Template
Product Version: 8.1.6
Purchase: https://1.envato.market/EA4JP
Website: http://www.keenthemes.com
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
License: For each use you must have a valid license purchased only from above link in order to legally use the theme for your project.
-->
<html lang="en">
<!--begin::Head-->
<head>
{{--    <title>{{config("app.name")}} | @yield("title","Generate P9")</title>--}}
    <meta charset="utf-8"/>
    <meta name="description"
          content="The most advanced Bootstrap Admin Theme on Themeforest trusted by 100,000 beginners and professionals. Multi-demo, Dark Mode, RTL support and complete React, Angular, Vue, Asp.Net Core, Rails, Spring, Blazor, Django, Express.js, Node.js, Flask & Laravel versions. Grab your copy now and get life-time updates for free."/>
    <meta name="keywords"
          content="metronic, bootstrap, bootstrap 5, angular, VueJs, React, Asp.Net Core, Rails, Spring, Blazor, Django, Express.js, Node.js, Flask & Laravel starter kits, admin themes, web design, figma, web development, free templates, free admin themes, bootstrap theme, bootstrap template, bootstrap dashboard, bootstrap dak mode, bootstrap button, bootstrap datepicker, bootstrap timepicker, fullcalendar, datatables, flaticon"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta property="og:locale" content="en_US"/>
    <meta property="og:type" content="article"/>
    <meta property="og:title"
          content="Metronic - Bootstrap 5 HTML, VueJS, React, Angular. Laravel, Asp.Net Core, Ruby on Rails, Spring Boot, Blazor, Django, Express.js, Node.js, Flask Admin Dashboard Theme & Template"/>
    <meta property="og:url" content="#"/>
    <meta property="og:site_name" content="Keenthemes | Metronic"/>
    <link rel="canonical" href="#"/>
    <link rel="shortcut icon" href="{{asset("dashboard/assets/media/logos/favicon.ico")}}"/>
    <!--begin::Fonts(mandatory for all pages)-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700"/>
    <!--end::Fonts-->
    <!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
    <link href="{{asset("dashboard/assets/plugins/global/plugins.bundle.css")}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('dashboard/assets/css/style.bundle.css')}}" rel="stylesheet" type="text/css"/>
    <!--end::Global Stylesheets Bundle-->
    <!--Begin::Google Tag Manager -->
    <script>(function (w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({'gtm.start': new Date().getTime(), event: 'gtm.js'});
            var f = d.getElementsByTagName(s)[0], j = d.createElement(s), dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src = 'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-5FS8GGP');</script>
    <!--End::Google Tag Manager -->
    <style>
        .fa-check{
            color: #2137b9 !important; zoom: 2;
        }
    </style>
</head>
<!--end::Head-->
<!--begin::Body-->
<body id="kt_body" class="app-blank">
<!--begin::Theme mode setup on page load-->
<script>var defaultThemeMode = "light";
    var themeMode;
    if (document.documentElement) {
        if (document.documentElement.hasAttribute("data-theme-mode")) {
            themeMode = document.documentElement.getAttribute("data-theme-mode");
        } else {
            if (localStorage.getItem("data-theme") !== null) {
                themeMode = localStorage.getItem("data-theme");
            } else {
                themeMode = defaultThemeMode;
            }
        }
        if (themeMode === "system") {
            themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light";
        }
        document.documentElement.setAttribute("data-theme", themeMode);
    }</script>
<!--end::Theme mode setup on page load-->
<!--Begin::Google Tag Manager (noscript) -->
<noscript>
    <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5FS8GGP" height="0" width="0"
            style="display:none;visibility:hidden"></iframe>
</noscript>
<!--End::Google Tag Manager (noscript) -->
<!--begin::Root-->
<div class="d-flex flex-column flex-root" id="kt_app_root">
    <!--begin::Authentication - Multi-steps-->
    <div class="d-flex flex-column flex-lg-row flex-column-fluid stepper stepper-pills stepper-column stepper-multistep"
         id="kt_create_account_stepper">
        <!--begin::Aside-->
        <div class="d-flex flex-column flex-lg-row-auto w-lg-350px w-xl-500px">
            <div
                class="d-flex flex-column position-lg-fixed top-0 bottom-0 w-lg-350px w-xl-500px scroll-y bgi-size-cover bgi-position-center"
                style="background-image: url({{asset("assets/side\ bar.png")}})">
                <!--begin::Header-->
                <div class="d-flex flex-center py-10 py-lg-20 mt-lg-20">
                    <!--begin::Logo-->
                    <a href="javascript:void(0);">
                        <img alt="Logo" src="{{asset("assets/img/logo.png")}}" class="h-70px"/>
                    </a>
                    <!--end::Logo-->
                </div>
                <!--end::Header-->
                <!--begin::Body-->
                <div class="d-flex flex-row-fluid justify-content-center p-10">
                    <!--begin::Nav-->
                    <div class="stepper-nav">
                        <!--begin::Step 1-->
                        <div class="stepper-item {{$segment2=="step-1"?"current":""}}" data-kt-stepper-element="nav">
                            <!--begin::Wrapper-->
                            <a href="{{route("generate_p9_step_1",['code' => request()->code])}}" class="stepper-wrapper">
                                <!--begin::Icon-->
                                <div class="stepper-icon rounded-3">
                                    <i class="{{$segment2=="step-1"?"stepper-check":""}} fas fa-check"></i>
                                    @if($segment2=="step-1")
                                        <span class="stepper-number">1</span>
                                    @endif
                                </div>
                                <!--end::Icon-->
                                <!--begin::Label-->
                                <div class="stepper-label">
                                    <h3 class="stepper-title fs-2">Account Type</h3>
                                    <div class="stepper-desc fw-normal">Select your account type</div>
                                </div>
                                <!--end::Label-->
                            </a>
                            <!--end::Wrapper-->
                            <!--begin::Line-->
                            <div class="stepper-line h-40px"></div>
                            <!--end::Line-->
                        </div>
                        <!--end::Step 1-->
                        <!--begin::Step 2-->
                        <div class="stepper-item {{$segment2=="step-2"?"current":""}}" data-kt-stepper-element="nav">
                            <!--begin::Wrapper-->
                            <a href="{{route("generate_p9_step_2",['code' => request()->code])}}"  class="stepper-wrapper">
                                <!--begin::Icon-->
                                <div class="stepper-icon rounded-3">
                                    <i class="{{str_replace("step-","",$segment2)<=2?"stepper-check":""}} fas fa-check"></i>
                                    @if(str_replace("step-","",$segment2)<=2)
                                        <span class="stepper-number">{{2}}</span>
                                    @endif
                                </div>
                                <!--end::Icon-->
                                <!--begin::Label-->
                                <div class="stepper-label">
                                    <h3 class="stepper-title fs-2">Personal Details</h3>
                                    <div class="stepper-desc fw-normal">Enter your Personal Details</div>
                                </div>
                                <!--end::Label-->
                            </a>
                            <!--end::Wrapper-->
                            <!--begin::Line-->
                            <div class="stepper-line h-40px"></div>
                            <!--end::Line-->
                        </div>
                        <!--end::Step 2-->
                        <!--begin::Step 3-->
                        <div class="stepper-item {{$segment2=="step-3"?"current":""}}" data-kt-stepper-element="nav">
                            <!--begin::Wrapper-->
                            <a href="{{route("generate_p9_step_3",['code' => request()->code])}}" class="stepper-wrapper">
                                <!--begin::Icon-->
                                <div class="stepper-icon rounded-3">
                                    <i class="{{str_replace("step-","",$segment2)<=3?"stepper-check":""}} fas fa-check"></i>
                                    @if(str_replace("step-","",$segment2)<=3)
                                        <span class="stepper-number">3</span>
                                    @endif
                                </div>

                                <!--end::Icon-->
                                <!--begin::Label-->
                                <div class="stepper-label">
                                    <h3 class="stepper-title fs-2">Other Income and Deductions</h3>
                                    <div class="stepper-desc fw-normal">Other Income and Deductions</div>
                                </div>
                                <!--end::Label-->
                            </a>
                            <!--end::Wrapper-->
                            <!--begin::Line-->
                            <div class="stepper-line h-40px"></div>
                            <!--end::Line-->
                        </div>
                        <!--end::Step 3-->
                        <!--begin::Step 4-->
                        <div class="stepper-item {{$segment2=="step-4"?"current":""}}" data-kt-stepper-element="nav">
                            <!--begin::Wrapper-->
                            <a href="{{route("generate_p9_step_4",['code' => request()->code])}}" class="stepper-wrapper">
                                <!--begin::Icon-->
                                <div class="stepper-icon rounded-3">
                                    <i class="{{str_replace("step-","",$segment2)<=4?"stepper-check":""}} fas fa-check"></i>
                                    @if(str_replace("step-","",$segment2)<=4)
                                        <span class="stepper-number">4</span>
                                    @endif
                                </div>
                                <!--end::Icon-->
                                <!--begin::Label-->
                                <div class="stepper-label">
                                    <h3 class="stepper-title">Billing Details</h3>
                                    <div class="stepper-desc fw-normal">Provide your payment info</div>
                                </div>
                                <!--end::Label-->
                            </a>
                            <!--end::Wrapper-->
                            <!--begin::Line-->
                            <div class="stepper-line h-40px"></div>
                            <!--end::Line-->
                        </div>
                        <!--end::Step 4-->
                        <!--begin::Step 5-->
                        <div class="stepper-item {{$segment2=="step-5"?"current":""}}" data-kt-stepper-element="nav">
                            <!--begin::Wrapper-->
                            <div class="stepper-wrapper">
                                <!--begin::Icon-->
                                <div class="stepper-icon rounded-3">
                                    <i class="{{str_replace("step-","",$segment2)<=5?"stepper-check":""}} fas fa-check"></i>
                                    @if(str_replace("step-","",$segment2)<=5)
                                        <span class="stepper-number">5</span>
                                    @endif
                                </div>
                                <!--end::Icon-->
                                <!--begin::Label-->
                                <div class="stepper-label">
                                    <h3 class="stepper-title">Completed</h3>
                                    <div class="stepper-desc fw-normal">Your account is created</div>
                                </div>
                                <!--end::Label-->
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Step 5-->
                    </div>
                    <!--end::Nav-->
                </div>
                <!--end::Body-->
                <!--begin::Footer-->
                <div class="d-flex flex-center flex-wrap px-5 py-10">
                    <!--begin::Links-->
                    <div class="d-flex fw-normal">
                        <a href="#" class="text-success px-5" target="_blank">Terms</a>
                        <a href="#" class="text-success px-5" target="_blank">Plans</a>
                        <a href="#" class="text-success px-5" target="_blank">Contact Us</a>
                    </div>
                    <!--end::Links-->
                </div>
                <!--end::Footer-->
            </div>
        </div>
        <!--begin::Aside-->
        <!--begin::Body-->
        <div class="d-flex flex-column flex-lg-row-fluid">

            <!--begin::Content-->
            <div class="{{--d-flex--}} pt-20 px-10 flex-center flex-column flex-column-fluid">

                @yield("content")
                <!--begin::Wrapper-->
{{--                <div class="w-lg-650px w-xl-700px p-10 p-lg-15 mx-auto">--}}
{{--                    <!--begin::Form-->--}}
{{--                    --}}
{{--                    <!--end::Form-->--}}
{{--                </div>--}}
                <!--end::Wrapper-->
            </div>
            <!--end::Content-->
        </div>
        <!--end::Body-->
    </div>
    <!--end::Authentication - Multi-steps-->
</div>
<!--end::Root-->
<!--begin::Javascript-->
<script>var hostUrl = "/metronic8/demo1/assets/";</script>
<!--begin::Global Javascript Bundle(mandatory for all pages)-->
<script src="{{asset("dashboard/assets/plugins/global/plugins.bundle.js")}}"></script>
<script src="{{asset("dashboard/assets/js/scripts.bundle.js")}}"></script>
<!--end::Global Javascript Bundle-->
<!--begin::Custom Javascript(used for this page only)-->
<script src="{{asset("dashboard/assets/js/custom/utilities/modals/create-account.js")}}"></script>
<!--end::Custom Javascript-->
<!--end::Javascript-->
@yield("js")
</body>
<!--end::Body-->
</html>
