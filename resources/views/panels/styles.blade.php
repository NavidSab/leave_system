<link rel="stylesheet" href="{{ asset('assets/vendors/css/vendors.min.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/vendors/css/ui/prism.min.css') }}" />
{{-- Vendor Styles --}}
@yield('vendor-style')
{{-- Theme Styles --}}

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/bootstrap-extended.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/colors.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/components.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/themes/dark-layout.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/themes/bordered-layout.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/themes/semi-dark-layout.css')}}">
    
{{-- {!! Helper::applClasses() !!} --}}
@php $configData = Helper::applClasses(); @endphp

{{-- Page Styles --}}
@if($configData['mainLayoutType'] === 'horizontal')
<link rel="stylesheet" href="{{ asset('assets/css/core/menu/menu-types/horizontal-menu.css') }}" />
@endif
<link rel="stylesheet" href="{{ asset('assets/css/core/menu/menu-types/vertical-menu.css') }}" />
 <link rel="stylesheet" href="{{ asset('assets/css/core/colors/palette-gradient.css') }}"> 

{{-- Page Styles --}}
@yield('page-style')

{{-- Laravel Style --}}
{{-- <link rel="stylesheet" href="{{ asset('assets/css/overrides.css') }}" /> --}}

{{-- Custom RTL Styles --}}

@if($configData['direction'] === 'rtl' && isset($configData['direction']))
<link rel="stylesheet" href="{{ asset('assets/css/custom-rtl.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/css/style-rtl.css') }}" />
@endif

{{-- user custom styles --}}
<link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />
