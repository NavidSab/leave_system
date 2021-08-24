@extends('layouts.contentLayoutMaster') 
@section('title', $title)
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


@section('content')
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
          <form class="form" action="{{ route('leave.store') }}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="row">
                <div class="col-md-3 col-12">
                  <div class="mb-1">
                    <label class="form-label" for="from_date"> From </label>
                    <input type="text" value="{{ old('date_from') }}" name="date_from" id="from_date" class="form-control flatpickr-basic"  placeholder="YYYY-MM-DD" required readonly/>
                  </div>
                </div>
                <div class="col-md-3 col-12">
                  <div class="mb-1">
                    <label class="form-label" for="to_date"> To </label>
                    <input type="text" value="{{ old('date_to') }}" name="date_to" id="to_date" class="form-control flatpickr-basic" placeholder="YYYY-MM-DD" required readonly/>
                  </div>
                </div>
         
                <div class="col-md-3 col-12">
                  <div class="mb-1">
                    </select>  
                    <label class="form-label" for="department_id">Department</label>
                    <select class="select2 form-select" id="department_id" required name="department_id">
                      @foreach ($departments as $item)                  
                      <option value="{{ $item->id }}" {{ old('department_id') == $item->id ? "selected" : "" }}>{{ $item->name }}</option>
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

                <div class="col-6">
                    <a href="{{ route('leave') }}" class="btn btn-primary btn-prev waves-effect waves-float waves-light">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left align-middle me-sm-25 me-0"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>
                        <span class="align-middle d-sm-inline-block d-none">Back</span>
                      </a>
                  <button type="submit" class="btn btn-success btn-submit waves-effect waves-float waves-light">Create</button>

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

