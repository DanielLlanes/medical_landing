@extends('layouts.layout')

@section('main-content')
    @include('navbars.navbar-top')
    @yield('content')
    @include('common.footer')
@endsection
