@extends('layouts.app')

@section('content')
        
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="row mb-3">
                    @error('error')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
        </div>
        <div>
            <login-component></login-component>
        </div>
@endsection


