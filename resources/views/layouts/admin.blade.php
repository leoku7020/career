<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <!-- Fonts -->
    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
    <script>
    WebFont.load({
        google: { "families": ["Poppins:300,400,500,600,700", "Roboto:300,400,500,600,700"] },
        active: function() {
            sessionStorage.fonts = true;
        }
    });
    </script>
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <!-- Styles -->
    <link href="{{ asset('vendor/metronic5.2/vendors.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('vendor/metronic5.2/style.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link rel="shortcut icon" href="{{asset('vendor/metronic5.2/images/favicon.ico')}}" />
    <link rel='shortcut icon' type='image/x-icon' href='{{asset('vendor/metronic5.2/images/favicon.ico')}}' />
    {{-- <link href="{{ asset('css/admin.css') }}" rel="stylesheet" type="text/css" /> --}}
</head>
<body class="m-page--fluid m--skin- m-content--skin-light2 m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--fixed m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default">
    <div class="m-grid m-grid--hor m-grid--root m-page">
        @include('admin.share.header')
        <!-- begin::Body -->
        <div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">
            <!-- BEGIN: Left Aside -->
            @include('admin.share.sidebar')
            <!-- END: Left Aside -->
            <div class="m-grid__item m-grid__item--fluid m-wrapper">
                @yield('content')
            </div>


        </div>
        <!-- end:: Body -->
        <!-- begin::Footer -->
        {{-- @include('admin.share.footer') --}}
        <!-- end::Footer -->
    </div>
    <!-- begin::Quick Sidebar -->
    @include('admin.share.right_panel')
    <!-- end::Quick Sidebar -->
    <div id="m_scroll_top" class="m-scroll-top">
        <i class="la la-arrow-up"></i>
    </div>
    <!-- begin::Quick Nav -->

    <!-- end::Quick Nav -->
    <script src="{{ asset('vendor/metronic5.2/vendors.bundle.js') }}" type="text/javascript"></script>
    <script src="{{ asset('vendor/metronic5.2/scripts.bundle.js') }}" type="text/javascript"></script>
    <script src="{{ asset('vendor/metronic5.2/bootstrap-select.js') }}" type="text/javascript"></script>
    <script src="{{ asset('vendor/metronic5.2/bootstrap-datepicker.js') }}" type="text/javascript"></script>
    <script src="{{ asset('vendor/metronic5.2/bootstrap-datetimepicker.js') }}" type="text/javascript"></script>
    <script src="{{ asset('vendor/metronic5.2/sweetalert2.js') }}" type="text/javascript"></script>
    <script src="{{ asset('vendor/metronic5.2/data-local.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/admin/common.js') }}" type="text/javascript"></script>
    <!-- include summernote css/js-->
    <!--中文語系-->
    <script src="{{ asset('vendor/metronic5.2/summernote-zh-TW.js') }}" type="text/javascript"></script>
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.js"></script>
    @yield('page-scripts')
    <style>
    .datepicker tbody tr>td.day.selected, .datepicker tbody tr>td.day.selected:hover, .datepicker tbody tr>td.day.active, .datepicker tbody tr>td.day.active:hover{
        background: #BD9060;
        color: #fff;
    }
    </style>
</body>
</html>
