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
          <form class="form" action="{{ route('department.update') }}" method="post">
              @csrf
              <input type="hidden" name="department_id" value="{{ $department->id }}">
              <div class="row">
                <div class="col-md-6 col-12">
                  <div class="mb-1">
                    <label class="form-label" for="first-name-column"> Name</label>
                    <input type="text" id="first-name-column" class="form-control" placeholder="Name" name="name" required value="{{ $department->name }}">
                  </div>
                </div>
                <div class="col-md-6 col-12">
                  <div class="mb-1">
                        <label class="form-label" for="head">Head</label>
                        <select  class="select2 form-select"id="department_id" multiple="multiple" name="user[]" required>
                          @foreach ($user as $item)                  
                          <option value="{{ $item->id }}" {{ in_array($item->id, $departmentUsers)  ? 'selected' : ''}}>{{ $item->name }}</option>
                          @endforeach
                        </select>
                </div>
                </div>
            
                <div class="col-12">
                  <button type="submit" class="btn btn-primary me-1 waves-effect waves-float waves-light">Edit</button>
                  <a href="{{ route('department') }}" class="btn btn-outline-secondary waves-effect">Back </a>
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