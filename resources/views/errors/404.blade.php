{{-- @extends('layouts.auth-layout') --}}

@section('content')
    <div class="card">
        <div class="card-body p-4 p-sm-5">
            <div class="fw-black lh-1 text-300 fs-error">404</div>

            <p class="lead mt-4 text-800 font-sans-serif fw-semi-bold w-md-75 w-xl-100 mx-auto">
                The page you're looking for is not found.
            </p>

            <hr />

            <p>
                Make sure the address is correct and that the page hasn't moved.
                If you think this is a mistake, <a href="mailto:info@example.com">contact us</a>.
            </p>

            <a class="btn btn-primary btn-sm mt-3" href="{{ url('/') }}">
                <span class="fas fa-home me-2"></span>Take me home
            </a>
        </div>
    </div>
@endsection
