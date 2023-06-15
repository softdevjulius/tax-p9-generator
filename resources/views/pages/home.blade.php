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
                                <a style="height: 40px !important;" id="logo" href="{{route("landing")}}" title="" data-height="60" data-padding="15"><img
                                        class="logo-main scale-with-grid" src="{{asset("logo.png")}}"
                                        data-retina="{{asset("logo.png")}}" data-height="34"
                                        alt="company3"><img class="logo-sticky scale-with-grid"
                                                            src="{{asset("logo.png")}}"
                                                            data-retina="{{asset("logo.png")}}"
                                                            data-height="34" alt="company3"><img
                                        class="logo-mobile scale-with-grid" src="{{asset("logo.png")}}"
                                        data-retina="{{asset("logo.png")}}" data-height="34"
                                        alt="company3"><img class="logo-mobile-sticky scale-with-grid"
                                                            src="{{asset("logo.png")}}"
                                                            data-retina="{{asset("logo.png")}}"
                                                            data-height="34" alt="Logo"></a>
                            </div>
                            <div class="menu_wrapper">
                                <nav id="menu">
                                    <ul id="menu-main-menu" class="menu menu-main">
                                        <li class="current-menu-item">
                                            <a style="color: #005596 !important;" href="{{route('landing')}}"><span>HOME</span></a>
                                        </li>

                                        <li>
                                            <a style="color: #005596 !important;" href="{{route("paye_calculator")}}"><span>PAYE CALCULATOR</span></a>
                                        </li>

                                        <li>
                                            <a style="color: #005596 !important;" href="{{route("generate_p9")}}"><span><span
                                                        style="padding:0"> TAX RETURNS </span></span></a>
                                        </li>


                                    </ul>
                                </nav>
                                <a class="responsive-menu-toggle" href="i#"><i class="icon-menu-fine"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mfn-main-slider" id="mfn-rev-slider">
                <div id="rev_slider_1_1_wrapper" class="rev_slider_wrapper fullwidthbanner-container"
                     data-source="gallery"
                     style="margin:0px auto;background:transparent;padding:0px;margin-top:0px;margin-bottom:0px;">
                    <div id="rev_slider_1_1" class="rev_slider fullwidthabanner" style="display:none;"
                         data-version="5.4.8">
                        <ul>
                            <li data-index="rs-1" data-transition="fade" data-slotamount="default"
                                data-hideafterloop="0" data-hideslideonmobile="off" data-easein="default"
                                data-easeout="default" data-masterspeed="300" data-rotate="0" data-saveperformance="off"
                                data-title="Slide"
                                data-param1="" data-param2="" data-param3="" data-param4="" data-param5=""
                                data-param6="" data-param7="" data-param8="" data-param9="" data-param10=""
                                data-description="">
                                <img
                                    src="file:///C|/Users/Alexandra/Desktop/be html/betheme.muffingroupsc.netdna-cdn.com/be/company3/wp-content/plugins/revslider/admin/assets/images/transparent.png"
                                    title="Home" data-bgposition="center center" data-bgfit="cover"
                                    data-bgrepeat="no-repeat"
                                    data-bgparallax="off" class="rev-slidebg" data-no-retina>
                                <div class="tp-caption   tp-resizeme rs-parallaxlevel-7" id="slide-1-layer-11"
                                     data-x="center" data-hoffset="322" data-y="1"
                                     data-width="['none','none','none','none']"
                                     data-height="['none','none','none','none']" data-type="image"
                                     data-responsive_offset="on"
                                     data-frames='[{"delay":200,"speed":1000,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                                     data-textAlign="['inherit','inherit','inherit','inherit']"
                                     data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]"
                                     data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 5;">
                                    <img src="{{asset("asset/images/home_company3_slider_pic4.png")}}" data-ww="1920px"
                                         data-hh="900px" width="1920" height="900" data-no-retina>
                                </div>
                                <div class="tp-caption   tp-resizeme rs-parallaxlevel-3" id="slide-1-layer-1"
                                     data-x="center" data-hoffset="" data-y="center" data-voffset="-13"
                                     data-width="['auto']" data-height="['auto']" data-type="text"
                                     data-responsive_offset="on"
                                     data-frames='[{"delay":500,"speed":1000,"frame":"0","from":"y:50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                                     data-textAlign="['inherit','inherit','inherit','inherit']"
                                     data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]"
                                     data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
                                     style="z-index: 6; white-space: nowrap; font-size: 200px; line-height: 110px; font-weight: 400; color: #005596 !important; letter-spacing: 0px;font-family:Poppins;">
                                    TaxGenius.
                                </div>
                                <div class="tp-caption   tp-resizeme rs-parallaxlevel-7" id="slide-1-layer-8"
                                     data-x="center" data-hoffset="" data-y=""
                                     data-width="['none','none','none','none']"
                                     data-height="['none','none','none','none']" data-type="image"
                                     data-responsive_offset="on"
                                     data-frames='[{"delay":200,"speed":1000,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                                     data-textAlign="['inherit','inherit','inherit','inherit']"
                                     data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]"
                                     data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 7;">
                                    <img src="{{asset("asset/images/home_company3_slider_pic4.png")}}" data-ww="1920px"
                                         data-hh="900px" width="1920" height="900" data-no-retina>
                                </div>
                                <div class="tp-caption   tp-resizeme rs-parallaxlevel-10" id="slide-1-layer-9"
                                     data-x="center" data-hoffset="" data-y=""
                                     data-width="['none','none','none','none']"
                                     data-height="['none','none','none','none']" data-type="image"
                                     data-responsive_offset="on"
                                     data-frames='[{"delay":300,"speed":1000,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                                     data-textAlign="['inherit','inherit','inherit','inherit']"
                                     data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]"
                                     data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 8;">
                                    <img src="{{asset("asset/images/home_company3_slider_pic5.png")}}" data-ww="1920px"
                                         data-hh="900px" width="1920" height="900" data-no-retina>
                                </div>
                                <div class="tp-caption   tp-resizeme rs-parallaxlevel-2" id="slide-1-layer-2"
                                     data-x="center" data-hoffset="" data-y="center" data-voffset="-152"
                                     data-width="['auto']" data-height="['auto']" data-type="text"
                                     data-responsive_offset="on"
                                     data-frames='[{"delay":400,"speed":1000,"frame":"0","from":"y:50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                                     data-textAlign="['inherit','inherit','inherit','inherit']"
                                     data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]"
                                     data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
                                     style="z-index: 9; white-space: nowrap; font-size: 32px; line-height: 32px; font-weight: 500; color: #d2d2d2; letter-spacing: 0px;font-family:Poppins;">
                                   EQN
                                </div>
                                <a href="{{route("generate_p9")}}" class="tp-caption rev-btn  tp-resizeme rs-parallaxlevel-2" id="slide-1-layer-3"
                                     data-x="center" data-hoffset="" data-y="center" data-voffset="173"
                                     data-width="['auto']" data-height="['auto']" data-type="button"
                                     data-responsive_offset="on"
                                     data-frames='[{"delay":600,"speed":1000,"frame":"0","from":"y:50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"},{"frame":"hover","speed":"0","ease":"Linear.easeNone","to":"o:1;rX:0;rY:0;rZ:0;z:0;","style":"c:rgb(255,255,255);bg:rgb(17,17,17);bs:solid;bw:0 0 0 0;"}]'
                                     data-textAlign="['inherit','inherit','inherit','inherit']"
                                     data-paddingtop="[17,17,17,17]" data-paddingright="[80,80,80,80]"
                                     data-paddingbottom="[17,17,17,17]" data-paddingleft="[80,80,80,80]"
                                     style="z-index: 10; white-space: nowrap; font-size: 14px; line-height: 15px; font-weight: 700; color: rgba(255,255,255,1); letter-spacing: 5px;font-family:Poppins;background-color:#005596;border-color:rgb(1, 47, 107);outline:none;box-shadow:none;box-sizing:border-box;-moz-box-sizing:border-box;-webkit-box-sizing:border-box;cursor:pointer;">
                                    TAX RETURNS
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </header>
    </div>
    <!-- <div id="Content">
        <div class="content_wrapper clearfix">
            <div class="sections_group">
                <div class="entry-content">
                    <div class="section mcb-section"
                         style="padding-top:160px; padding-bottom:240px; background-color:#bac3c4; background-image:url({{asset("asset/images/home_company3_sectionbg1.jpg")}}); background-repeat:no-repeat; background-position:center top">
                        <div class="section_wrapper mcb-section-inner">
                            <div class="wrap mcb-wrap one valign-top clearfix">
                                <div class="mcb-wrap-inner">
                                    <div class="column mcb-column one column_column">
                                        <div class="column_attr clearfix align_center">
                                            <h6 style="color: #000;">WHAT WE DO?</h6>
                                            <hr class="no_line" style="margin:0 auto 10px">
                                            <h1 style="color:#fff">we are ready</h1>
                                            <h3>for all challenges!</h3>
                                        </div>
                                    </div>
                                    <div class="column mcb-column one column_divider ">
                                        <hr class="no_line" style="margin:0 auto 70px">
                                    </div>
                                    <div class="column mcb-column one-third column_column">
                                        <div class="column_attr clearfix align_center"
                                             style="background-image:url('{{asset('asset/images/home_company3_columnbg1.png')}}'); background-repeat:no-repeat; background-position:left top; padding:80px 50px 65px; box-shadow: 60px 60px 80px rgba(0,0,0,.13); border-radius: 20px; margin: 0 2%;">
                                            <div
                                                class="image_frame image_item no_link scale-with-grid alignnone no_border">
                                                <div class="image_wrapper">
                                                    <img class="scale-with-grid"
                                                         src="{{asset("asset/images/home_company3_pic1.png")}}">
                                                </div>
                                            </div>
                                            <hr class="no_line" style="margin:0 auto 40px">
                                            <h4 style="color:#fff">Understand</h4>
                                            <hr class="no_line" style="margin:0 auto 10px">
                                            <p style="color: #dde1e2;">
                                                Ut ultricies imperdiet sodales. Aliquam fringilla aliquam ex sit amet
                                                elementum.
                                            </p>
                                            <hr class="no_line" style="margin:0 auto 10px">
                                            <div
                                                class="image_frame image_item no_link scale-with-grid alignnone no_border">
                                                <div class="image_wrapper">
                                                    <img class="scale-with-grid"
                                                         src="{{asset("asset/images/home_company3_pic4.png")}}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="column mcb-column one-third column_column">
                                        <div class="column_attr clearfix align_center"
                                             style="background-image:url({{asset('asset/images/home_company3_columnbg2.png')}}); background-repeat:no-repeat; background-position:left top; padding:80px 50px 65px; box-shadow: 60px 60px 80px rgba(0,0,0,.13); border-radius: 20px; margin: 0 2%;">
                                            <div
                                                class="image_frame image_item no_link scale-with-grid alignnone no_border">
                                                <div class="image_wrapper">
                                                    <img class="scale-with-grid"
                                                         src="{{asset('asset/images/home_company3_pic2.png')}}">
                                                </div>
                                            </div>
                                            <hr class="no_line" style="margin:0 auto 40px">
                                            <h4 style="color:#fff">Research</h4>
                                            <hr class="no_line" style="margin:0 auto 10px">
                                            <p style="color: #dde1e2;">
                                                Ut ultricies imperdiet sodales. Aliquam fringilla aliquam ex sit amet
                                                elementum.
                                            </p>
                                            <hr class="no_line" style="margin:0 auto 10px">
                                            <div
                                                class="image_frame image_item no_link scale-with-grid alignnone no_border">
                                                <div class="image_wrapper">
                                                    <img class="scale-with-grid"
                                                         src="{{asset("asset/images/home_company3_pic4.png")}}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="column mcb-column one-third column_column">
                                        <div class="column_attr clearfix align_center"
                                             style="background-image:url({{asset('asset/images/home_company3_columnbg3.png')}}); background-repeat:no-repeat; background-position:left top; padding:80px 50px 65px; box-shadow: 60px 60px 80px rgba(0,0,0,.13); border-radius: 20px; margin: 0 2%;">
                                            <div
                                                class="image_frame image_item no_link scale-with-grid alignnone no_border">
                                                <div class="image_wrapper">
                                                    <img class="scale-with-grid"
                                                         src="{{asset('asset/images/home_company3_pic3.png')}}">
                                                </div>
                                            </div>
                                            <hr class="no_line" style="margin:0 auto 40px">
                                            <h4 style="color:#fff">Understand</h4>
                                            <hr class="no_line" style="margin:0 auto 10px">
                                            <p style="color: #dde1e2;">
                                                Ut ultricies imperdiet sodales. Aliquam fringilla aliquam ex sit amet
                                                elementum.
                                            </p>
                                            <hr class="no_line" style="margin:0 auto 10px">
                                            <div
                                                class="image_frame image_item no_link scale-with-grid alignnone no_border">
                                                <div class="image_wrapper">
                                                    <img class="scale-with-grid"
                                                         src="{{asset("asset/images/home_company3_pic4.png")}}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div> -->
    <footer id="Footer" class="clearfix">
        <div class="widgets_wrapper" style="padding:70px 0;">
            <div class="container">
                <div class="column two-third">
                    <aside class="widget_text widget widget_custom_html">
                        <div class="textwidget custom-html-widget">
                            <h3>Equinox</h3>
                            <hr class="no_line" style="margin:0 auto 20px">
                            <div class="column one-second">
                                <p>
                                    Western Heights

                                </p>
                            </div>
                            <div class="column one-second">
                                <p>
                                    <a href="mailto:info@eqncs.com"><span>info@eqncs.com</span></a>
                                    <br> +254 (0) 720 980 956
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
                                            <img class="scale-with-grid" style="height: 40px !important;"
                                                 src="{{asset("logo.png")}}">
                                        </a>
                                        <div class="image_links ">
                                            <a href="mailto:info@eqncs.com" class="link"><i class="icon-link"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <hr class="no_line" style="margin:0 auto 50px">
                                <a class="button button_size_2 button_js" href="{{route("general_p9_talk_to_expert")}}" style="color:#fff;"><span
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
            ;
        };
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
