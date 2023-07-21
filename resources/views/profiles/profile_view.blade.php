@extends('layouts.master')
@section('title', 'SHS System | ' . $UserData->username . '\'s Profile')
@section('content')

    {{-- Content Wrapper. Contains page content --}}
    @include('sweetalert::alert')
    <div class="wrapper">
        {{-- Content Wrapper. Contains page content --}}
        <div class="content-wrapper">
            <div class="container-full">
                {{-- Main content --}}
                <section class="content">
                    @if ($errors)
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger alert-dismissible fade show" role="alert" align="center"><button
                                    type="button" class="close" data-dismiss="alert" aria-label="Close" <span
                                    aria-hidden="true">&times;</span></button><strong>{{ $error }}</strong></div>
                        @endforeach
                    @endif
                    {{-- Basic Forms --}}
                    <div class="box box-widget widget-user">
                        <div class="widget-user-header bg-black">
                            <h3 class="widget-user-username">{{ $UserData->name }}</h3>
                            <h6 class="widget-user-desc">Role: {{ $UserData->user_type }}</h6>
                            <h6 class="widget-user-desc">Email: {{ $UserData->email }}</h6>
                        </div>
                        <div class="widget-user-image">
                            <img id="showImage" class="rounded-circle user-img"
                                src="{{ !empty($UserData->user_img) ? url('images/userImages/' . $UserData->user_img) : url('images/userImages/avatar.png') }}"
                                alt="User Avatar" style="height: 100px;">
                        </div>
                        <div class="box-footer mt-4">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="description-block">
                                    </div>
                                </div>
                                <div class="col-sm-4 br-1 bl-1">
                                    <div class="description-block">
                                        <h5 class="description-header">{{ $UserData->username }}</h5>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="description-block">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('profiles.personal.infomation.update') }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            {{-- @method('put') --}}
                            <div class="row">
                                <div class="col-md-6">
                                    <h3>Profile Information</h3>
                                    <h5>Update your account's profile information and email address</h5>
                                </div>
                                <div class="col-md-6">
                                    <div class="card shadow mb-4">
                                        <div class="card-body">
                                            <div class="mb-4">
                                                <input type="hidden" value="{{ $UserData->user_img }}" name="user_img1">
                                                <input type="file" id="actual-btn" class="form-control-file"
                                                    name="user_img" hidden>
                                                <label for="actual-btn"
                                                    style="background-color: indigo; color:white; padding:0.5rem; border-radius:0.3rem; cursor:pointer; margin-top:1rem;">choose
                                                    a new photo</label>
                                            </div>
                                            <div class="form-group mb-4">
                                                <h5>Name</h5>
                                                <div class="controls">
                                                    <input class="form-control" type="text" name="name"
                                                        value="{{ $UserData->name }}" autocomplete="off">
                                                </div>
                                            </div>
                                            <div class="form-group mb-4">
                                                <h5>Username</h5>
                                                <div class="controls">
                                                    <input class="form-control" type="text" name="username"
                                                        value="{{ $UserData->username }}" autocomplete="off">
                                                </div>
                                            </div>
                                            <div class="form-group mb-4">
                                                <h5>Email</h5>
                                                <div class="controls">
                                                    <input class="form-control" type="email" name="email"
                                                        value="{{ $UserData->email }}" autocomplete="off">
                                                </div>
                                            </div>
                                            <div class="row justify-content-end">
                                                <div class="col-md-4 mb-2">
                                                    <button type="submit" class="btn btn-primary btn-md btn-block"><i
                                                            data-feather="check"></i> Save</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <form action="{{ route('profiles.password.update') }}" method="post"
                            enctype="multipart/form-data">
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
                                                    <input class="form-control" type="password"
                                                        name="new_confirm_password"
                                                        value="{{ old('new_confirm_password') }}" autocomplete="off">
                                                </div>
                                            </div>
                                            <div class="row justify-content-end">
                                                <div class="col-md-6 mb-2">
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
                    <hr>
                    {{-- box --}}
                </section>
                {{-- content --}}
            </div>
        </div>
        {{-- content-wrapper --}}
    </div>
    {{-- content-wrapper --}}
@endsection
