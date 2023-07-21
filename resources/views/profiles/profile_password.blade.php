@extends('layouts.auth.master')
@section('title', 'SHS System | ' . $UserData->username . '\'s Profile')
@section('content')
    @include('sweetalert::alert')
    {{-- Content Wrapper. Contains page content --}}
    @include('sweetalert::alert')
    <div class="wrapper">
        {{-- Content Wrapper. Contains page content --}}
        <div class="content-wrapper">
            <div class="container-full">
                @if ($errors)
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger alert-dismissible fade show" role="alert" align="center"><button
                                type="button" class="close" data-dismiss="alert" aria-label="Close" <span
                                aria-hidden="true">&times;</span></button><strong>{{ $error }}</strong></div>
                    @endforeach
                @endif
                {{-- Main content --}}
                <section class="content">
                    {{-- Basic Forms --}}
                    <div class="card-body">
                        <form action="{{ route('profiles.password.update') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <h3>Update Password</h3>
                                    <h5>Ensure your account is using a long, random password to stay secure</h5>
                                </div>
                                <div class="col-md-6">
                                    <div class="card shadow mb-4">
                                        <div class="card-body">
                                            <div class="form-group mb-4">
                                                <h5>Current Password</h5>
                                                <div class="controls">
                                                    <input class="form-control" type="password" name="current_password"
                                                        value="{{ old('current_password') }}" autocomplete="off">
                                                </div>
                                            </div>
                                            <div class="form-group mb-4">
                                                <h5>New Password</h5>
                                                <div class="controls">
                                                    <input class="form-control" type="password" name="new_password"
                                                        value="{{ old('new_password') }}" autocomplete="off">
                                                </div>
                                            </div>
                                            <div class="form-group mb-4">
                                                <h5>Confirm Password</h5>
                                                <div class="controls">
                                                    <input class="form-control" type="password" name="new_confirm_password"
                                                        value="{{ old('new_confirm_password') }}" autocomplete="off">
                                                </div>
                                            </div>
                                            <div class="row justify-content-end">
                                                <div class="col-md-5 mb-2">
                                                    <button type="submit" class="btn btn-primary btn-md btn-block">Change
                                                        Password</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    {{-- box --}}
                </section>
                {{-- content --}}
            </div>
        </div>
        {{-- content-wrapper --}}
    </div>
    {{-- content-wrapper --}}
@endsection
