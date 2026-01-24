@extends('layouts.layout')

@section('main-content')
    <div class="row flex-center min-vh-100 py-6 text-center">
        <div class="col-sm-10 col-md-8 col-lg-6 col-xxl-5">
            <a class="d-flex flex-center mb-4" href="{{ url('/') }}">
                <img class="me-2" src="{{ Vitx::asset('assets/img/icons/spot-illustrations/falcon.png') }}" alt="Falcon Logo"
                    width="58" />
                <span class="font-sans-serif text-primary fw-bolder fs-4 d-inline-block">falcon</span>
            </a>
            @yield('content')
        </div>
    </div>
@endsection
