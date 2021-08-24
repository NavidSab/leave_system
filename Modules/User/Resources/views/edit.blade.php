




@extends('layouts.contentLayoutMaster') @section('title', $title)
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
          <form class="form" action="{{ route('user.update') }}" method="post">
              @csrf
              <input type="hidden" name="user_id" value="{{ $user->id }}">
              <div class="row">
                <div class="col-md-4 col-12">
                  <div class="mb-1">
                    <label class="form-label" for="first-name-column"> Name</label>
                    <input type="text" id="first-name-column" class="form-control" placeholder="Name" name="name" required value="{{ $user->name }}">
                  </div>
                </div>
                <div class="col-md-4 col-12">
                    <div class="mb-1">
                      <label class="form-label" for="first-email-column"> Email</label>
                      <input type="email" id="first-email-column" class="form-control" placeholder="email" name="email" required value="{{ $user->email }}">
                    </div>
                  </div>
                  <div class="col-md-4 col-12">
                    <div class="mb-1">
                      <label class="form-label" for="first-password-column"> Password</label>
                      <input type="password" id="first-password-column" class="form-control" placeholder="password" name="password" >
                    </div>
                  </div>
            </div>
            <div class="row">
            
          
                  <div class="col-md-4 col-12">
                    <div class="mb-1">
                      <label class="form-label" for="first-confirm-password-column"> Confirm Password</label>
                      <input type="password" id="first-confirm-password-column" class="form-control" placeholder="Confirm Password" name="confirm-password" >
                    </div>
                  </div>
                  <div class="col-md-6 col-12">
                    <div class="mb-1">
                        <strong>Role:</strong>
                        <select name="roles[]" class="form-control" multiple>
                            @foreach ($roles as $items )
                                <option value="{{ $items->id }}" {{ in_array($items->id,$userRole) ? 'selected' : ''}}
                                    >{{ $items->name }}</option>  
                            @endforeach
                        </select>
                    </div>
                  </div>
            </div>
            <div class="row">
                <div class="col-12">
                  <button type="submit" class="btn btn-primary me-1 waves-effect waves-float waves-light">Edit</button>
                  <a href="{{ route('user') }}" class="btn btn-outline-secondary waves-effect">Back </a>
                </div>
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




