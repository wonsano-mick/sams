@extends('layouts.auth.master')
@section('title', 'SHS System | Register School')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8" style="margin-top: 2%;">
                <div class="card">
                    <div class="card-header" style="text-align: center">{{ __('Register School') }}</div>
                    <div class="card-body">
                        <div class="row">
                            {{-- <div class="col-lg-6 offset-lg-3"> --}}
                            <div class="col-lg-6 offset-lg-4 mb-2">
                                <a href="{{ url('schoolInfo/create') }}"><button
                                        class="btn bg-primary text-uppercase rounded text-white text-lg">
                                        Register School </span>
                                    </button>
                                </a>
                            </div>
                            {{-- </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
