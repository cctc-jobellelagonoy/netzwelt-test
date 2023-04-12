@extends('layouts.app')

@section('content')
        
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">404 Error Page</div>

                <div class="card-body">
                    <h1>Oops! Page not found.</h1>
                    <p>We can't find the page you're looking for. <a href="{{ url('/') }}">Go back to the homepage</a>.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection