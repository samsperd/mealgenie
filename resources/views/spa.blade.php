@php
$config = [
    'appName' => config('app.name'),
    'locale' => $locale = app()->getLocale(),
    'locales' => config('app.locales'),
    'githubAuth' => config('services.github.client_id'),
];
@endphp
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
  <meta name="msapplication-TileColor" content="#FFFFFF"/>
  <meta name="theme-color" content="#FFFFFF"/>
  <meta name="apple-mobile-web-app-status-bar-style" content="white"/>
  <meta name="apple-mobile-web-app-capable" content="yes"/>
  <meta name="mobile-web-app-capable" content="yes"/>
  <meta name="HandheldFriendly" content="True"/>
  <meta name="MobileOptimized" content="320"/>
  <meta name="description" content="{{setting('site.description')}}">

  <title>{{Voyager::setting('site.title')}}</title>
  <link rel="icon" href="{{asset('images/icon.png')}}">
  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-184749820-1"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
  
    gtag('config', 'UA-184749820-1');
  </script>
  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-C07FQPXE6K"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
  
    gtag('config', 'G-C07FQPXE6K');
  </script>
    
  <link rel="stylesheet" href="{{ mix('dist/css/app.css') }}">

  <link href="{{asset('vendor/bootstrap-4.1/bootstrap.min.css')}}" rel="stylesheet" media="all">

  <!-- Fontfaces CSS-->
  <link href="https://cdn.jsdelivr.net/npm/@mdi/font@5.x/css/materialdesignicons.min.css" rel="stylesheet">
  <link href="{{asset('css/font-face.css')}}" rel="stylesheet" media="all">
  <link href="{{asset('vendor/font-awesome-4.7/css/font-awesome.min.css')}}" rel="stylesheet" media="all">
  <link href="{{asset('vendor/font-awesome-5/css/fontawesome-all.min.css')}}" rel="stylesheet" media="all">
  <link href="{{asset('vendor/mdi-font/css/material-design-iconic-font.min.css')}}" rel="stylesheet" media="all">

  <!-- Vendor CSS-->
  <link href="{{asset('vendor/animsition/animsition.min.css')}}" rel="stylesheet" media="all">
  <link href="{{asset('vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css')}}" rel="stylesheet" media="all">
  <link href="{{asset('vendor/wow/animate.css')}}" rel="stylesheet" media="all">
  <link href="{{asset('vendor/css-hamburgers/hamburgers.min.css')}}" rel="stylesheet" media="all">
  <link href="{{asset('vendor/slick/slick.css')}}" rel="stylesheet" media="all">
  <link href="{{asset('vendor/select2/select2.min.css')}}" rel="stylesheet" media="all">
  <link href="{{asset('vendor/perfect-scrollbar/perfect-scrollbar.css')}}" rel="stylesheet" media="all">
  <link href="{{asset('vendor/vector-map/jqvmap.min.css')}}" rel="stylesheet" media="all">
  <link rel="stylesheet" type="text/css" href="{{asset('font/flaticon.css')}}">

  <!-- Main CSS-->
  <link href="{{asset('css/theme.css')}}" rel="stylesheet" media="all">

  <style>
      .header-mobile-2.header-mobile .hamburger .hamburger-box .hamburger-inner, .hamburger-inner::before,  .hamburger-inner::after{
          background: black !important;
      }
      .btn-dash{
        background-color: orange !important;
        border-color: orange !important;
        color:white !important;
      }
      .text-dash{
        color: orange !important;
      }
      .text-green{
        color: #036904 !important;
      }
      .bg-dash {
          background: orange !important;
          color: white !important;
      }
      .bg-back{
        background: #fefffc !important;
        color: black !important;
      }
      .border-dash {border-color: orange !important;}
      .btn-pill {
        padding-right: 1.5em !important;
        padding-left: 1.5em !important;
        border-radius: 10rem !important;
      }
      .hr-text {
        background-color: white;     
      }
      .hr {
        align-items: center;
        margin: 2rem 0;
        line-height: 0px;
        height: 0px;
        border-top: 1px solid #eee;
        text-align: center;       
    }
    .img-wrapper {  
  overflow: hidden; 
}

.inner-img {
  transition: 0.3s;
}

.img-wrapper:hover .inner-img {
  transform: scale(1.1);
}

/* Other styling elements, that are not necessary for the example */

.img-wrapper {
  display: inline-block;
  box-sizing: border-box;
  //border: 1px solid #000;
}
    body {
      font-family: sans-serif;
    }
  
  </style>    
  
</head>
<body>
  <div id="app"></div>

  {{-- Global configuration object --}}
  <script>
    window.config = @json($config);
  </script>

  {{-- Load the application scripts --}}
  <script src="{{ mix('dist/js/app.js') }}"></script>
  {{-- <script>
    (function ($) {
    // USE STRICT
    "use strict";
    var navbars = ['header', 'aside'];
    var hrefSelector = 'a:not([target="_blank"]):not([href^="#"]):not([class^="chosen-single"])';
    var linkElement = navbars.map(element => element + ' ' + hrefSelector).join(', ');
    $(".animsition").animsition({
      inClass: 'fade-in',
      outClass: 'fade-out',
      inDuration: 900,
      outDuration: 900,
      linkElement: linkElement,
      loading: true,
      loadingParentElement: 'html',
      loadingClass: 'page-loader',
      loadingInner: '<div class="page-loader__spin"></div>',
      timeout: false,
      timeoutCountdown: 5000,
      onLoadEvent: true,
      browser: ['animation-duration', '-webkit-animation-duration'],
      overlay: false,
      overlayClass: 'animsition-overlay-slide',
      overlayParentElement: 'html',
      transition: function (url) {
        window.location.href = url;
      }
    });
  
  
  })(jQuery);

  </script> --}}

    <!-- Jquery JS-->
    {{-- <script type="text/javascript" 
    src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> --}}
    {{-- <script src="{{ asset('vendor/jquery-3.2.1.min.js') }}"></script>
    <script src="https://code.jquery.com/ui/1.10.2/jquery-ui.js" ></script> --}}


    <!-- Bootstrap JS-->
    {{-- <script src="{{asset('vendor/bootstrap-4.1/popper.min.js')}}"></script>
    <script src="{{asset('vendor/bootstrap-4.1/bootstrap.min.js')}}"></script> --}}
    {{-- <script src="{{ asset('js/main.js') }}"></script> --}}
    <script src="{{asset('vendor/select2/select2.min.js')}}">
    </script>


</body>
</html>
