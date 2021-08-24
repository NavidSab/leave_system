<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Dashboard | King Graphics</title>
        <meta name="csrf-token" content="{{ csrf_token() }}"/>
        {{-- <!--<link
        href="{{Module::asset('dashboard:vendor/fontawesome/css/fontawesome.min.css')
        }}" rel="stylesheet">--> --}}
        {{-- <!--<link
        href="{{Module::asset('dashboard:vendor/fontawesome/css/solid.min.css') }}"
        rel="stylesheet">--> --}}
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
        <link
            href="{{Module::asset('dashboard:vendor/fontawesome/css/brands.min.css') }}"
            rel="stylesheet">
        <link
            href="{{Module::asset('dashboard:vendor/bootstrap/css/bootstrap.min.css') }}"
            rel="stylesheet">
        <link href="{{Module::asset('dashboard:css/master.css') }}" rel="stylesheet">
        <link
            href="{{Module::asset('dashboard:css/navbar/navbar-dropdowns.css') }}"
            rel="stylesheet">
        <link
            href="{{Module::asset('dashboard:css/sidebar/sidebar-default.css') }}"
            rel="stylesheet">
        <link
            href="{{Module::asset('dashboard:vendor/flagiconcss/css/flag-icon.min.css') }}"
            rel="stylesheet">
        @yield('css')
    </head>
    <body>
        <div class="wrapper">
            @include('dashboard::include.sidebar')
            <div id="body" class="active">
                <nav class="navbar navbar-expand-lg navbar-white bg-white">
                    <button type="button" id="sidebarCollapse" class="btn btn-light">
                        <i class="fas fa-bars"></i>
                        <span></span></button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto">
                            <li class="nav-item dropdown">
                                <div class="nav-dropdown">
                                    <a
                                        href=""
                                        class="nav-item nav-link dropdown-toggle text-secondary"
                                        data-toggle="dropdown">
                                        <i class="fas fa-user"></i>
                                        <span>{{Auth::user()->name}}
                                            {{Auth::user()->family}}</span>
                                        <i style="font-size: .8em;" class="fas fa-caret-down"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right nav-link-menu">
                                        <ul class="nav-list">
                                            <li>
                                                <a
                                                    class="dropdown-item"
                                                    href="{{ route('logout') }}"
                                                    onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                                    <i class="fas fa-sign-out-alt"></i>
                                                    Logout</a>
                                            </li>
                                            <form
                                                id="logout-form"
                                                action="{{ route('logout') }}"
                                                method="POST"
                                                class="d-none">
                                                @csrf
                                            </form>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
                @yield('content')
            </div>
        </div>
        <div loading_overlay="loading_overlay" style="display:none">
            <span loading_text="loading_text"></span></div>
        <script src="{{Module::asset('dashboard:vendor/jquery/jquery.min.js') }}"></script>
        <script
            src="{{Module::asset('dashboard:vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        {{-- <script
            src="{{Module::asset('dashboard:vendor/datatables/datatables.min.js') }}"></script>
        <script src="{{Module::asset('dashboard:js/initiate-datatables.js') }}"></script> --}}
        <script src="{{Module::asset('dashboard:js/script.js') }}"></script>
        @yield('script')
    </body>
</html>