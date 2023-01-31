<!DOCTYPE html>
<!--[if lt IE 7]>
<html class="no-js lt-ie10 lt-ie9 lt-ie8 lt-ie7 "> <![endif]-->
<!--[if IE 7]>
<html class="no-js lt-ie10 lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>
<html class="no-js lt-ie10 lt-ie9"> <![endif]-->
<!--[if IE 9]>
<html class="no-js lt-ie10"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js">
<!--<![endif]-->

<head>

    <!-- Basic Page Needs -->
    <meta charset="utf-8">
    <title>{{config("app.name")}} | @yield("title",'Dashboard')</title>
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- Favicons -->
    <link rel="shortcut icon" href="{{asset("asset/images/favicon.ico")}}">

    <!-- FONTS -->
    <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Roboto:100,300,400,400italic,700'>
    <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Patua+One:100,300,400,400italic,700'>
    <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Lato:400,400italic,700,700italic,900'>
    <link rel='stylesheet'
          href='http://fonts.googleapis.com/css?family=Poppins:100,300,400,400italic,500,700,700italic'>

    <!-- CSS -->
    <link rel='stylesheet' href='https://beantown.website/html/be/html/css/global.css'>
    <link rel='stylesheet' href='{{asset("asset/css/structure.css")}}'>
    <link rel='stylesheet' href='{{asset("asset/css/company3.css")}}'>
    <link rel='stylesheet' href='{{asset("asset/css/custom.css")}}'>

    <link rel='stylesheet' href='{{asset("asset/css/style-demo.css")}}'>

    <!-- Revolution Slider -->
    <link rel="stylesheet" href="{{asset("plugins/rs-plugin-5.3.1/css/settings.css")}}">

</head>

<body
    class="color-custom style-default button-flat layout-full-width if-zoom if-border-hide no-content-padding no-shadows header-transparent minimalist-header-no sticky-header sticky-tb-color ab-hide subheader-title-left menu-link-color menuo-right menuo-no-borders mobile-tb-center mobile-side-slide mobile-mini-mr-ll be-reg-20954">
<div id="Wrapper">
    <div id="Header_wrapper" class="bg-parallax" data-enllax-ratio="0.3">
        <header id="Header">

            <div id="Top_bar">
                <div class="container">
                    <div class="column one">
                        <div class="top_bar_left clearfix">
                            <div class="logo">
                                <a id="logo" href="{{route("landing")}}" title="" data-height="60" data-padding="15"><img
                                        class="logo-main scale-with-grid" src="{{asset("asset/images/logo.png")}}"
                                        data-retina="{{asset("asset/images/logo.png")}}" data-height="34"
                                        alt="company3"><img class="logo-sticky scale-with-grid"
                                                            src="{{asset("asset/images/logo.png")}}"
                                                            data-retina="{{asset("asset/images/logo.png")}}"
                                                            data-height="34" alt="company3"><img
                                        class="logo-mobile scale-with-grid" src="{{asset("asset/images/logo.png")}}"
                                        data-retina="{{asset("asset/images/logo.png")}}" data-height="34"
                                        alt="company3"><img class="logo-mobile-sticky scale-with-grid"
                                                            src="{{asset("asset/images/logo.png")}}"
                                                            data-retina="{{asset("asset/images/logo.png")}}"
                                                            data-height="34" alt="Logo"></a>
                            </div>
                            <div class="menu_wrapper">
                                <nav id="menu">
                                    <ul id="menu-main-menu" class="menu menu-main">
                                        <li>
                                            <a href="{{route('landing')}}"><span>HOME</span></a>
                                        </li>

                                        <li class="current-menu-item">
                                            <a href="{{route("paye_calculator")}}"><span>PAYE CALCULATOR</span></a>
                                        </li>

                                        <li>
                                            <a href="{{route("generate_p9")}}"><span><span
                                                        style="padding:0;color:rgb(1, 47, 107);"> TAX RETURNS </span></span></a>
                                        </li>
                                    </ul>
                                </nav>
                                <a class="responsive-menu-toggle" href="i#"><i class="icon-menu-fine"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
    </div>
    <br>
    <br>
    <br>
    <br>
    <br>
    <div id="Content">
        <div class="content_wrapper clearfix">
            <div class="sections_group">
                <div class="entry-content">
                    <div class="section section-calculator" id="calcanchor">
                        <div class="container">
                            <h2 class="section-title">PAYE Calculator</h2>
                            <div class="spacer-2x"></div>
                            <div class="calc-container">
                                <div class="container full-width">
                                    <div class="column two-third">
                                        <form action="{{route("paye_calculator")}}" method="POST" id="paye-form" novalidate="novalidate">
                                            @csrf
                                            <div class="form-group">
{{--                                                <div class="row">--}}
{{--                                                    <div class="col-md-6">--}}
{{--                                                        <span class="group-label">Year of taxation</span> <span class="req-label"> * </span>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="col-md-6">--}}
{{--                                                        <div id="paye-form-year">--}}
{{--                                                            <select class="form-control valid" name="year" id="year" title="please select the year of taxation">--}}
{{--                                                                <option value="8">2022</option>--}}

{{--                                                                <option value="7">2021</option>--}}

{{--                                                                <option value="3">2020</option>--}}

{{--                                                                <option value="4">2019</option>--}}

{{--                                                                <option value="1">2018</option>--}}

{{--                                                                <option value="2">2017</option>--}}


{{--                                                            </select>--}}

{{--                                                        </div>--}}
{{--                                                        <div class="errorTxt"></div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}

                                            </div>
{{--                                            <div class="form-group">--}}
{{--                                                <div class="row">--}}
{{--                                                    <div class="col-md-6">--}}
{{--                                                        <span class="group-label">Payment Period</span><span class="req-label"> * </span>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="col-md-6">--}}
{{--                                                        <div id="paye-form-preiod">--}}
{{--                                                            <label id="label-month" class="radio-checkbox-btn radio-checkbox-bg-icon radio-checkbox-inline radio-checkbox-sm radius-b-circle checked" data-initialize="radio">--}}
{{--                                                                <input class="sr-only valid" id="month" name="period" type="radio" value="month" title="Is it a monthly payment">--}}
{{--                                                                <span class="radio-checkbox-label">Month</span>--}}
{{--                                                            </label>--}}
{{--                                                            <label id="label-year" class="radio-checkbox-btn radio-checkbox-bg-icon radio-checkbox-inline radio-checkbox-sm radius-b-circle checked" data-initialize="radio">--}}
{{--                                                                <input class="sr-only valid" id="year" name="period" type="radio" value="year" title="Is it a yearly payment">--}}
{{--                                                                <span class="radio-checkbox-label">Year</span>--}}
{{--                                                            </label>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="errorTxt"></div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <span class="group-label">Gross Salary</span> <span class="req-label"> * </span>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <input type="text" required class="form-control valid" id="gross_salary" name="gross_salary" placeholder="Gross Salary" title="This is the amount of money to be calculated" aria-invalid="false">
                                                        <div class="errorTxt"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <span class="group-label">Total Allowances </span>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <input type="text" class="form-control valid" id="total_allowance" name="total_allowance" placeholder="Allowance total" title="Total allowance" aria-invalid="false">
                                                        <div class="errorTxt"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <span class="group-label">Total Deductions</span>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <input type="text" class="form-control valid" id="total_deduction" name="total_deduction" placeholder="Total Deduction" title="This is total deductions amount" aria-invalid="false">
                                                        <div class="errorTxt"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <span class="group-label">Contribution Benefit </span>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <input type="text" class="form-control valid" id="nssf" name="nssf" placeholder="Contribution Benefit" title="This is the pension scheme/nssf" aria-invalid="false">
                                                        <div class="errorTxt"></div>
                                                    </div>
                                                </div>
                                            </div>
                                       {{--     <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <span class="group-label">Do you have a disability excemption certificate?</span>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div id="paye-form-disability">
                                                            <label id="label-month" class="radio-checkbox-btn radio-checkbox-bg-icon radio-checkbox-inline radio-checkbox-sm radius-b-circle checked" data-initialize="radio">
                                                                <input class="sr-only" id="disability-yes" name="disability" type="radio" value="1" title="Do you have any disability?">
                                                                <span class="radio-checkbox-label">Yes</span>
                                                            </label>
                                                            <label id="label-year" class="radio-checkbox-btn radio-checkbox-bg-icon radio-checkbox-inline radio-checkbox-sm radius-b-circle checked" data-initialize="radio">
                                                                <input class="sr-only" id="disability-no" name="disability" type="radio" value="2" title="Do you have any disability?">
                                                                <span class="radio-checkbox-label">No</span>
                                                            </label>
                                                        </div>
                                                        <div class="errorTxt"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <span class="group-label">Do you have a Mortgage?</span>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div id="paye-form-mortgage">
                                                            <label id="label-month" class="radio-checkbox-btn radio-checkbox-bg-icon radio-checkbox-inline radio-checkbox-sm radius-b-circle checked" data-initialize="radio">
                                                                <input class="sr-only" id="mortgage-yes" name="mortgage" type="radio" value="1" title="Do you have a Mortgage?">
                                                                <span class="radio-checkbox-label">Yes</span>
                                                            </label>
                                                            <label id="label-year" class="radio-checkbox-btn radio-checkbox-bg-icon radio-checkbox-inline radio-checkbox-sm radius-b-circle checked" data-initialize="radio">
                                                                <input class="sr-only" id="mortgage-no" name="mortgage" type="radio" value="2" title="Do you have a Mortgage?">
                                                                <span class="radio-checkbox-label">No</span>
                                                            </label>
                                                        </div>
                                                        <div class="errorTxt"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="mortgage-toogle" style="display:none;">
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <span class="group-label">Mortgage Interest</span>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <input type="text" class="form-control" id="mortgageinterest" name="mortgageinterest" placeholder="Mortgage Interest" title="The amount of interest you pay for your Mortgage">
                                                            <div class="errorTxt"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <span class="group-label">Do you have a life insurance policy?</span>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div id="paye-form-insurance">
                                                            <label id="label-month" class="radio-checkbox-btn radio-checkbox-bg-icon radio-checkbox-inline radio-checkbox-sm radius-b-circle checked" data-initialize="radio">
                                                                <input class="sr-only" id="insurance-yes" name="insurance" type="radio" value="1" title="Do you have a life insurance policy?">
                                                                <span class="radio-checkbox-label">Yes</span>
                                                            </label>
                                                            <label id="label-year" class="radio-checkbox-btn radio-checkbox-bg-icon radio-checkbox-inline radio-checkbox-sm radius-b-circle checked" data-initialize="radio">
                                                                <input class="sr-only" id="insurance-no" name="insurance" type="radio" value="2" title="Do you have a life insurance policy?">
                                                                <span class="radio-checkbox-label">No</span>
                                                            </label>
                                                        </div>
                                                        <div class="errorTxt"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="insurance-toggle" style="display: none;">
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <span class="group-label">Insurance Premium</span>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <input type="text" class="form-control" id="insurancerelief" name="insurancerelief" placeholder="Insurance Relief">
                                                            <div class="errorTxt"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <span class="group-label">Do you have a Home Ownership Savings Plan?</span>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div id="paye-form-hosp">
                                                            <label id="label-month" class="radio-checkbox-btn radio-checkbox-bg-icon radio-checkbox-inline radio-checkbox-sm radius-b-circle checked" data-initialize="radio">
                                                                <input class="sr-only" id="hosp-yes" name="hospchk" type="radio" value="1">
                                                                <span class="radio-checkbox-label">Yes</span>
                                                            </label>
                                                            <label id="label-year" class="radio-checkbox-btn radio-checkbox-bg-icon radio-checkbox-inline radio-checkbox-sm radius-b-circle checked" data-initialize="radio">
                                                                <input class="sr-only" id="hosp-no" name="hospchk" type="radio" value="2">
                                                                <span class="radio-checkbox-label">No</span>
                                                            </label>
                                                        </div>
                                                        <div class="errorTxt"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="hosp-toggle" style="display: none;">
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <span class="group-label">Home Ownership Total Deposit</span>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <input type="text" class="form-control" id="hosp" name="hosp" placeholder="Home Ownership Total Deposit">
                                                            <div class="errorTxt"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>--}}
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-6"></div>
                                                    <div class="col-md-6">
                                                        <input type="submit" name="kpa_mv_form_submit" id="kpa_mv_form_submit" class="btn btn-style-2" value="Calculate">
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="column one-third" id="results">

                                        @if(isset($results))
                                            {!! $results !!}
                                        @endif

                                    </div>

                                </div>

                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <footer id="Footer" class="clearfix">
        <div class="widgets_wrapper" style="padding:70px 0;">
            <div class="container">
                <div class="column two-third">
                    <aside class="widget_text widget widget_custom_html">
                        <div class="textwidget custom-html-widget">
                            <h3>Company Name</h3>
                            <hr class="no_line" style="margin:0 auto 20px">
                            <div class="column one-second">
                                <p>
                                    Western Heights

                                </p>
                            </div>
                            <div class="column one-second">
                                <p>
                                    <a href="index-company3.html#"><span>info@company.com</span></a>
                                    <br> +254 (0) 723 836 624
                                    <br>
                                </p>
                            </div>
                        </div>
                    </aside>
                </div>
                <div class="column one-third">
                    <aside class="widget_text widget widget_custom_html">
                        <div class="textwidget custom-html-widget">
                            <div style="text-align: right;">
                                <div class="image_frame image_item scale-with-grid alignnone no_border hover-disable">
                                    <div class="image_wrapper">
                                        <a href="#">
                                            <div class="mask"></div>
                                            <img class="scale-with-grid"
                                                 src="{{asset("content/company3/images/home_company3_pic8.png")}}">
                                        </a>
                                        <div class="image_links ">
                                            <a href="index-company3.html#" class="link"><i class="icon-link"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <hr class="no_line" style="margin:0 auto 50px">
                                <a class="button button_size_2 button_js" href="business.html" style="color:#fff;"><span
                                        class="button_label">Book Consulting</span></a>
                            </div>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
        <div class="footer_copy">
            <div class="container">
                <div class="column one">
                    <div class="copyright">
                        &copy; 2023 Tax System <a target="_blank" rel="nofollow" href="#"></a>
                    </div>
                    <ul class="social"></ul>
                </div>
            </div>
        </div>
    </footer>
</div>

<!-- side menu -->
<div id="Side_slide" class="right dark" data-width="250">
    <div class="close-wrapper">
        <a href="index-company3.html#" class="close"><i class="icon-cancel-fine"></i></a>
    </div>
    <div class="menu_wrapper"></div>
</div>
<div id="body_overlay"></div>

<!-- JS -->
<script src="{{asset("js/jquery-2.1.4.min.js")}}"></script>

<script src="{{asset("js/mfn.menu.js")}}"></script>
<script src="{{asset("js/jquery.plugins.js")}}"></script>
<script src="{{asset("js/jquery.jplayer.min.js")}}"></script>
<script src="{{asset("js/animations/animations.js")}}"></script>
<script src="{{asset("js/translate3d.js")}}"></script>
<script src="{{asset("js/scripts.js")}}"></script>


<script src="{{asset("plugins/rs-plugin-5.3.1/js/jquery.themepunch.tools.min.js")}}"></script>
<script src="{{asset("plugins/rs-plugin-5.3.1/js/jquery.themepunch.revolution.min.js")}}"></script>

<script src="{{asset("plugins/rs-plugin-5.3.1/js/extensions/revolution.extension.video.min.js")}}"></script>
<script src="{{asset("plugins/rs-plugin-5.3.1/js/extensions/revolution.extension.slideanims.min.js")}}"></script>
<script src="{{asset("plugins/rs-plugin-5.3.1/js/extensions/revolution.extension.actions.min.js")}}"></script>
<script src="{{asset("plugins/rs-plugin-5.3.1/js/extensions/revolution.extension.layeranimation.min.js")}}"></script>
<script src="{{asset("plugins/rs-plugin-5.3.1/js/extensions/revolution.extension.kenburn.min.js")}}"></script>
<script src="{{asset("plugins/rs-plugin-5.3.1/js/extensions/revolution.extension.navigation.min.js")}}"></script>
<script src="{{asset("plugins/rs-plugin-5.3.1/js/extensions/revolution.extension.migration.min.js")}}"></script>
<script src="{{asset("plugins/rs-plugin-5.3.1/js/extensions/revolution.extension.parallax.min.js")}}"></script>

<script>


    var revapi1, tpj;
    (function () {
        if (!/loaded|interactive|complete/.test(document.readyState))
            document.addEventListener("DOMContentLoaded", onLoad);
        else
            onLoad();

        function onLoad() {
            if (tpj === undefined) {
                tpj = jQuery;
                if ("off" == "on")
                    tpj.noConflict();
            }
            if (tpj("#rev_slider_1_1").revolution == undefined) {
                revslider_showDoubleJqueryError("#rev_slider_1_1");
            } else {
                revapi1 = tpj("#rev_slider_1_1").show().revolution({
                    sliderType: "hero",
                    sliderLayout: "auto",
                    dottedOverlay: "none",
                    delay: 9000,
                    visibilityLevels: [1240, 1024, 778, 480],
                    gridwidth: 1080,
                    gridheight: 800,
                    lazyType: "none",
                    parallax: {
                        type: "scroll",
                        origo: "enterpoint",
                        speed: 400,
                        speedbg: 0,
                        speedls: 0,
                        levels: [5, 10, 15, 20, 25, 30, 35, 40, 45, 46, 47, 48, 49, 50, 51, 55],
                    },
                    shadow: 0,
                    spinner: "spinner2",
                    autoHeight: "off",
                    disableProgressBar: "on",
                    hideThumbsOnMobile: "off",
                    hideSliderAtLimit: 0,
                    hideCaptionAtLimit: 0,
                    hideAllCaptionAtLilmit: 0,
                    debugMode: false,
                    fallbacks: {
                        simplifyAll: "off",
                        disableFocusListener: false,
                    }
                });
            }
        }



    }());
</script>


<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-52CM7KJK0K"></script>
<script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }

    gtag('js', new Date());
    gtag('config', 'G-52CM7KJK0K');
</script>


</body>

</html>
