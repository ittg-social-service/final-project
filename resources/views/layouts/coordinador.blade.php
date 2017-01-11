@extends('layouts.main')
@section('navigation')
	@include('shared.coord-navigation')
@endsection
@section('main')
	@yield('coord-content')
@stop