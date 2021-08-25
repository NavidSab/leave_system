@extends('log::layouts.master')
@section('content')
    <h1>Hello </h1>
    @if(session()->has('success'))
    <div class="alert alert-success">
         {{ session()->get('success') }}
     </div>
    @endif
    @if(session()->has('failed'))
       <div class="alert alert-danger">
            {{ session()->get('failed') }}
        </div>
    @endif
    <a href="https://leave.king.graphics/">Back TO Site</a>
@endsection
