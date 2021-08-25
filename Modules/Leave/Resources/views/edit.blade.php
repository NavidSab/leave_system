@extends('layouts.contentLayoutMaster')
 @section('title', $title)
@section('content')
@section('vendor-style')

  <!-- vendor css files -->
  <link rel="stylesheet" href="{{ asset('assets/vendors/css/forms/select/select2.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/vendors/css/pickers/pickadate/pickadate.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/vendors/css/pickers/flatpickr/flatpickr.min.css') }}">
 @endsection 

@section('page-style')
<link rel="stylesheet" href="{{ asset('assets/css/plugins/forms/pickers/form-flat-pickr.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/plugins/forms/pickers/form-pickadate.css') }}">
@endsection
<!-- Basic Tables start -->
<section id="multiple-column-form">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">{{ $title }}</h4>
          </div>
          <div class="card-body">
            @if (count($errors) > 0)
            <div class="alert alert-danger">
              <strong>Whoops!</strong> There were some problems with your input.<br><br>
              <ul>
                 @foreach ($errors->all() as $error)
                   <li>{{ $error }}</li>
                 @endforeach
              </ul>
            </div>
          @endif
          <form class="form" action="{{ route('leave.update') }}" method="post"enctype="multipart/form-data" >
              @csrf
              <input type="hidden" name="leave_id" value="{{ $leave->id }}">
              <div class="row">
                <div class="col-md-3 col-12">
                  <div class="mb-1">
                    <label class="form-label" for="from_date"> From </label>
                    <input type="text" value="{{ $leave->from_date }}" name="from_date" id="from_date" class="form-control flatpickr-date-time flatpickr-input active" placeholder="YYYY-MM-DD HH:MM" required readonly/>
                  </div>
                </div>
                <div class="col-md-3 col-12">
                  <div class="mb-1">
                    <label class="form-label" for="to_date"> To </label>
                    <input type="text" value="{{ $leave->to_date }}" name="to_date" id="to_date" class="form-control flatpickr-date-time flatpickr-input active" placeholder="YYYY-MM-DD HH:MM" required readonly/>
                  </div>
                </div>
                <div class="col-md-6 col-12">
                  <div class="mb-1">
                        <label class="form-label" for="head">Department</label>
                        <select class="select2 form-select" id="department_id" required name="department_id">
                          @foreach ($departments as $item) 
                          <option value="{{ $item->id }}" {{ $leave->department_id == $item->id ? 'selected' : ''}}>{{ $item->name }}</option>              
                          @endforeach
                        </select> 
                </div>
                </div>
                <div class="col-md-3 col-12">
                  <div class="mb-1">
                    <label class="form-label" for="document"> Document </label>
                    <input type="file" id="document" class="form-control" placeholder="document" name="document" >
                   </div>
                </div>
              </div>
                <div class="col-12">
                  <button type="submit" class="btn btn-primary me-1 waves-effect waves-float waves-light">Edit</button>
                  <a href="{{ route('leave') }}" class="btn btn-outline-secondary waves-effect">Back </a>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
<!-- Basic Tables end -->
@endsection
@section('vendor-script')
  <!-- vendor files -->
  <script src="{{ asset('assets/vendors/js/forms/select/select2.full.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/js/pickers/pickadate/picker.js') }}"></script>
    <script src="{{ asset('assets/vendors/js/pickers/pickadate/picker.date.js') }}"></script>
    <script src="{{ asset('assets/vendors/js/pickers/pickadate/picker.time.js') }}"></script>
    <script src="{{ asset('assets/vendors/js/pickers/pickadate/legacy.js') }}"></script>
    <script src="{{ asset('assets/vendors/js/pickers/flatpickr/flatpickr.min.js') }}"></script>
@endsection
@section('page-script')
  <!-- Page js files -->
   <script src="{{ asset('assets/js/scripts/forms/form-select2.js') }}"></script>
  <script src="{{ asset('assets/js/scripts/forms/pickers/form-pickers.js') }}"></script> 

@endsection

