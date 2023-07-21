@extends('layouts.auth.master')
@section('title', 'SHS Management System | Log in')
@section('content')
    @include('sweetalert::alert')
    @php
        $SchoolInfoExist = App\Models\SchoolInfo::first();
    @endphp
    <div class="row justify-content-center no-gutters">
        <div class="col-lg-6 col-md-7 col-12">
            <div class="content-top-agile p-10">
                <h3 class="text-white">student assessment management system</h3>
            </div>
            @if ($errors)
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger alert-dismissible fade show" role="alert" align="center"><button
                            type="button" class="close" data-dismiss="alert" aria-label="Close" <span
                            aria-hidden="true">&times;</span></button><strong>{{ $error }}</strong></div>
                @endforeach
            @endif
            <div class="p-30 o-hidden border-0 rounded30 box-shadowed shadow-lg">
                <div class="text-center pb-3">
                    <img src="{{ asset('images/logo/' . $SchoolInfoExist->logo_of_school) }}" alt="" srcset=""
                        class="rounded-circle" style="width: 150px; height: 150px;">
                </div>
                <form action="{{ route('login') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend" style="height: 50px;">
                                <span class="input-group-text bg-transparent text-white"><i class="ti-user"></i></span>
                            </div>
                            <input type="text" name="username"
                                class="form-control pl-15 bg-transparent text-white plc-white" placeholder="username"
                                autofocus autocomplete="off">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend" style="height: 50px;">
                                <span class="input-group-text  bg-transparent text-white"><i class="ti-lock"></i></span>
                            </div>
                            <input type="password" name="password"
                                class="form-control pl-15 bg-transparent text-white plc-white" placeholder="password"
                                required>
                        </div>
                    </div>
                    <div class="col-12 text-center">
                        <button type="submit" class="login-btn btn-block">LOG IN</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
@endsection
