
@extends('layouts.contentLayoutMaster')
@section('title', 'Dashboard')
@section('vendor-style')
  {{-- vendor css files --}}
  <link rel="stylesheet" href="{{ asset('assets/vendors/css/charts/apexcharts.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/vendors/css/extensions/toastr.min.css') }}">
@endsection
@section('page-style')
  {{-- Page css files --}}
  <link rel="stylesheet" href="{{ asset('assets/css/pages/dashboard-ecommerce.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/plugins/charts/chart-apex.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/plugins/extensions/ext-component-toastr.css') }}">
@endsection
@section('content')
<!-- Dashboard Ecommerce Starts -->
<section id="dashboard-ecommerce">
  <div class="row match-height">


    @if(auth()->user()->hasRole('admin'))
    <!-- Statistics Card -->
    <div class="col-xl-12 col-md-12 col-12">
      <div class="card card-statistics">
        <div class="card-header">
          <h4 class="card-title">Statistics</h4>
          <div class="d-flex align-items-center">
            {{-- <p class="card-text font-small-2 mr-25 mb-0">Updated 1 month ago</p> --}}
          </div>
        </div>
        <div class="card-body statistics-body">
          <div class="row">
            <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
              <div class="media">
                <div class="avatar bg-light-primary mr-2">
                  <div class="avatar-content">
                    <i data-feather="trending-up" class="avatar-icon"></i>
                  </div>
                </div>
                <div class="media-body my-auto">
                  <h4 class="font-weight-bolder mb-0"> </h4>
                  <a href="{{ route('leave') }}"><p class="card-text font-small-3 mb-0">Leave</p></a>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
    <!--/ Statistics Card -->
    @endif
  </div>


</section>
<!-- Dashboard Ecommerce ends -->
@endsection
