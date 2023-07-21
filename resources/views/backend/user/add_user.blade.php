@extends('layouts.master')
@section('title', 'SHS System | ' . $title)
@section('content')

    {{-- Content Wrapper. Contains page content --}}
    <div class="wrapper">
        {{-- <!-- Content Wrapper. Contains page content --}}
        <div class="content-wrapper">
            <div class="container-full">
                {{-- <!-- Main content --}}
                <section class="content">
                    {{-- <!-- Basic Forms --}}
                    @if ($errors)
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger alert-dismissible fade show" role="alert" align="center"><button
                                    type="button" class="close" data-dismiss="alert" aria-label="Close" <span
                                    aria-hidden="true">&times;</span></button><strong>{{ $error }}</strong></div>
                        @endforeach
                    @endif
                    <div class="box">
                        <div class="box-header with-border">
                            <h4 class="box-title">User Registration Form</h4>
                        </div>
                        {{-- box-header --}}
                        <div class="box-body">
                            <div class="row">
                                <div class="col">
                                    <form action="{{ route('users.store') }}" method="post">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>User Role <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <select name="user_type" id="select" class="form-control">
                                                            <option value="{{ old('user_type') }}" selected=""
                                                                disabled="">{{ old('user_type') }}</option>
                                                            <option value="Admin">Admin</option>
                                                            <option value="User">User</option>
                                                            <option value="Special">Special</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Name <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="name" class="form-control"
                                                            value="{{ old('name') }}" autocomplete>
                                                    </div>
                                                    <div class="form-control-feedback"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Username<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="username" class="form-control"
                                                            value="{{ old('username') }}" autocomplete>
                                                    </div>
                                                    <div class="form-control-feedback"></div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Email <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="email" name="email" class="form-control"
                                                            value="{{ old('email') }}" autocomplete>
                                                    </div>
                                                    <div class="form-control-feedback"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Password <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="password" name="password" class="form-control"
                                                            value="{{ old('password') }}" autocomplete>
                                                    </div>
                                                    <div class="form-control-feedback"></div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Confirm Password<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="password" name="password_confirmation"
                                                            class="form-control" value="{{ old('password_confirmation') }}"
                                                            autocomplete>
                                                    </div>
                                                    <div class="form-control-feedback"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-xs-right">
                                            <button type="submit" class="btn btn-info btn-rounded">Add User</button>
                                        </div>
                                    </form>
                                </div>
                                {{-- col --}}
                            </div>
                            {{-- row --}}
                        </div>
                        {{-- box-body --}}
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
