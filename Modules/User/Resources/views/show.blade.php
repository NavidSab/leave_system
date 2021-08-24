

@extends('layouts.contentLayoutMaster')
 @section('title', $title)
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
                    <div class="row">
                        <div class="col-md-6 col-12">
                            <div class="mb-1">
                                <strong>Name:</strong>
                                <div class="badge rounded-pill badge-light-primary"> {{ $user->name }}</div>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="mb-1">
                                <strong>Email:</strong>
                                <div class="badge rounded-pill badge-light-primary"> {{ $user->email }}</div>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="mb-1">
                                <strong>Roles:</strong>
                             
                                @if(!empty($user->roles))
                                @foreach($user->roles as $roles)
                                  <div class="badge rounded-pill badge-light-primary">{{  $roles->name   }}</div> 
                                @endforeach
                              @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <a
                                href="{{ route('user') }}"
                                class="btn btn-primary btn-prev waves-effect waves-float waves-light">
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    width="14"
                                    height="14"
                                    viewbox="0 0 24 24"
                                    fill="none"
                                    stroke="currentColor"
                                    stroke-width="2"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    class="feather feather-arrow-left align-middle me-sm-25 me-0">
                                    <line x1="19" y1="12" x2="5" y2="12"></line>
                                    <polyline points="12 19 5 12 12 5"></polyline>
                                </svg>
                                <span class="align-middle d-sm-inline-block d-none">Back</span>
                            </a>
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