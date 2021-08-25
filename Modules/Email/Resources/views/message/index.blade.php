@extends('layouts.blankMessage')
 @section('title', config('app.name') )
 @section('content')
<!-- Basic Tables start -->
<div class="row" id="basic-table">
    <div class="col-12">
        <div class="card">
            <div class="card-body text-center">
                    @if(session()->has('Success'))
                    <h2 class="text-success">
                         {{ session()->get('Success') }}
                        </h2>
                    @elseif(session()->has('Failed'))
                     <h2 class="text-danger">
                        {{ session()->get('Failed') }}
                       </h2>
                    @else
                     <h2><b>Life </b>is still going on, keep going <b>stronger</b></h2>  
                    @endif
                <hr>
               <span> Back </span>to <b><a href="{{  config('app.url') }}"> {{  config('app.name') }}</a></b>
            </div>
            <div class="table">
            </div>
        </div>
        {{-- {!! $leaves->render() !!} --}}
    </div>
</div>
<!-- Basic Tables end -->
@endsection
@section('vendor-script')
  <!-- vendor files -->
  <script src="{{ asset('assets/vendors/js/extensions/toastr.min.js') }}"></script>
@endsection
@section('page-script')
@if ($message = Session::get('success'))
<script>
    $(function () {
    'use strict';
    var isRtl = $('html').attr('data-textdirection') === 'rtl';
    toastr['success']( '👋{{ $message }} ', 'Good Job',
     {
      closeButton: true,
      tapToDismiss: false,
      progressBar: true,
      rtl: isRtl
    });
    });
</script>
@endif
@endsection
