@extends('dashboard::main.master')
@section('css')
<link href="{{Module::asset('menu:menu.css')}}" rel="stylesheet">
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
@endsection
@section('content')
   {!! Menu::render() !!}
@endsection  
@section('script')
{!! Menu::scripts() !!}
@endsection


