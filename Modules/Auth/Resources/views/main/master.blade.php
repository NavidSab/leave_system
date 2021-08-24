<!DOCTYPE html>
<html
    class="loading dark-layout"
    lang="en"
    data-layout="dark-layout"
    data-textdirection="ltr">
    <!-- BEGIN: Head-->
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta
            name="viewport"
            content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta name="author" content="{{ config('app.author', 'Navid Sabbaghi') }}">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Admin Dashboard') }}</title>
        <link rel="apple-touch-icon" href="{{asset('assets/images/ico/apple-icon-120.png')}}">
        <link
            rel="shortcut icon"
            type="image/x-icon"
            href="{{asset('assets/images/ico/favicon.ico')}}">
        <link
            href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600"
            rel="stylesheet">
        <!-- BEGIN: Vendor CSS-->
        <link
            rel="stylesheet"
            type="text/css"
            href="{{asset('assets/vendors/css/vendors.min.css')}}">
        <!-- END: Vendor CSS-->
        <!-- BEGIN: Theme CSS-->
        <link rel="stylesheet" type="text/css" href="{{asset('assets/css/bootstrap.min.css')}}">
        <link
            rel="stylesheet"
            type="text/css"
            href="{{asset('assets/css/bootstrap-extended.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('assets/css/colors.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('assets/css/components.min.css')}}">
        <link
            rel="stylesheet"
            type="text/css"
            href="{{asset('assets/css/themes/dark-layout.min.css')}}">
        <link
            rel="stylesheet"
            type="text/css"
            href="{{asset('assets/css/themes/bordered-layout.min.css')}}">
        <link
            rel="stylesheet"
            type="text/css"
            href="{{asset('assets/css/themes/semi-dark-layout.min.css')}}">
        <!-- BEGIN: Page CSS-->
        <link
            rel="stylesheet"
            type="text/css"
            href="{{asset('assets/css/core/menu/menu-types/horizontal-menu.min.css')}}">
        <link
            rel="stylesheet"
            type="text/css"
            href="{{asset('assets/css/plugins/forms/form-validation.css')}}">
        <link
            rel="stylesheet"
            type="text/css"
            href="{{asset('assets/css/pages/page-auth.min.css')}}">
        <!-- END: Page CSS-->

        <!-- BEGIN: Custom CSS-->
        <link rel="stylesheet" type="text/css" href="{{asset('assets/css/style.css')}}">
        <!-- END: Custom CSS-->

    </head>
    <!-- END: Head-->

    <!-- BEGIN: Body-->
    <body
        class="horizontal-layout horizontal-menu blank-page navbar-floating footer-static  "
        data-open="hover"
        data-menu="horizontal-menu"
        data-col="blank-page">
        <!-- BEGIN: Content-->

        <main class="py-4">
            @yield('content')
        </main>

        <!-- BEGIN: Vendor JS-->
        <script src="{{asset('assets/vendors/js/vendors.min.js')}}"></script>
        <!-- BEGIN Vendor JS-->

        <!-- BEGIN: Page Vendor JS-->
        <script src="{{asset('assets/vendors/js/ui/jquery.sticky.js')}}"></script>
        <script src="{{asset('assets/vendors/js/forms/validation/jquery.validate.min.js')}}"></script>
        <!-- END: Page Vendor JS-->

        <!-- BEGIN: Theme JS-->
        <script src="{{asset('assets/js/core/app-menu.min.js')}}"></script>
        <script src="{{asset('assets/js/core/app.min.js')}}"></script>
        <!-- END: Theme JS-->

        <!-- BEGIN: Page JS-->
        <script src="{{asset('assets/js/scripts/pages/page-auth-login.js')}}"></script>
        <!-- END: Page JS-->

        <script>
            $(window).on('load', function () {
                if (feather) {
                    feather.replace({width: 14, height: 14});
                }
            })
        </script>
    </body>
    <!-- END: Body-->
</html>