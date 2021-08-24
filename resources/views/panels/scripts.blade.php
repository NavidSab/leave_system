{{-- Vendor Scripts --}}
<script src="{{ asset('assets/vendors/js/vendors.min.js') }}"></script>
<script src="{{ asset('assets/vendors/js/ui/prism.min.js') }}"></script>
@yield('vendor-script')
{{-- Theme Scripts --}}
<script src="{{ asset('assets/js/core/app-menu.js') }}"></script>
<script src="{{ asset('assets/js/core/app.js') }}"></script>
@if($configData['blankPage'] === false)
<script src="{{ asset('assets/js/scripts/customizer.js') }}"></script>
@endif
{{-- page script --}}
@yield('page-script')
{{-- page script --}}
