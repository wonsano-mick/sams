@extends('layouts.body.app')
@section('title', 'SA Management System | Add Staff')
@section('content')

    {{-- Content Wrapper. Contains page content --}}
    <div class="wrapper">
        <div class="content-wrapper">
            <div class="container-full">
                <section class="content">
                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger alert-dismissible fade show" role="alert" align="center">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <strong>{{ $error }}</strong>
                            </div>
                        @endforeach
                    @endif
                    <div class="box">
                        <div class="box-header with-border">
                            <h4 class="box-title">Add Staff's Details</h4>
                        </div>
                        <div class="box-body">
                            <div class="row">
                                <div class="col">
                                    <form id="studentForm" action="{{ route('staff.store') }}" method="post"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Surname <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="surname" class="form-control"
                                                            value="{{ old('surname') }}" autocomplete required>
                                                    </div>
                                                    <div class="form-control-feedback"></div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Other Names <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="other_names" class="form-control"
                                                            value="{{ old('other_names') }}" autocomplete required>
                                                    </div>
                                                    <div class="form-control-feedback"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Date of Birth<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="date" name="date_of_birth" class="form-control"
                                                            value="{{ old('date_of_birth') }}" required>
                                                    </div>
                                                    <div class="form-control-feedback"></div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Gender <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <select name="gender" id="select" class="form-control" required>
                                                            <option value="{{ old('gender') }}">{{ old('gender') }}</option>
                                                            <option value="Male">Male</option>
                                                            <option value="Female">Female</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-control-feedback"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Mobile Number<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="phone_number" class="form-control"
                                                            value="{{ old('phone_number') }}" required>
                                                    </div>
                                                    <div class="form-control-feedback"></div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Phone Number</h5>
                                                    <div class="controls">
                                                        <input type="text" name="mobile_number" class="form-control"
                                                            value="{{ old('mobile_number') }}">
                                                    </div>
                                                    <div class="form-control-feedback"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Email Address</h5>
                                                    <div class="controls">
                                                        <input type="email" name="email" class="form-control"
                                                            value="{{ old('email') }}" required>
                                                    </div>
                                                    <div class="form-control-feedback"></div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Residential Address</h5>
                                                    <div class="controls">
                                                        <input type="text" name="residential_address"
                                                            class="form-control" value="{{ old('residential_address') }}"
                                                            required>
                                                    </div>
                                                    <div class="form-control-feedback"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Department</h5>
                                                    <div class="controls">
                                                        <select name="department" id="select" class="form-control"
                                                            required>
                                                            <option value="{{ old('department') }}">
                                                                {{ old('department') }}</option>
                                                            <option value="Academics">Academics</option>
                                                            <option value="Administration">Administration</option>
                                                            <option value="Kitchen">Kitchen</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-control-feedback"></div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Job Title</h5>
                                                    <div class="controls">
                                                        <input type="text" name="job_title" class="form-control"
                                                            value="{{ old('job_title') }}" required>
                                                    </div>
                                                    <div class="form-control-feedback"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Date of Employment</h5>
                                                    <div class="controls">
                                                        <input type="date" name="date_of_employment"
                                                            class="form-control" value="{{ old('date_of_employment') }}"
                                                            required>
                                                    </div>
                                                    <div class="form-control-feedback"></div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="controls">
                                                    <div class="mb-4">
                                                        <img id="showImage"
                                                            src="{{ asset('images/staffImages/avatar.png') }}"
                                                            width="120" height="90" alt="Staff Image"><br>
                                                        <input type="file" id="actual-btn" class="form-control-file"
                                                            name="staff_image" hidden>
                                                        <label for="actual-btn"
                                                            style="background-color: indigo; color:white; padding:0.5rem; border-radius:0.3rem; cursor:pointer; margin-top:1rem;">Choose
                                                            Student Image</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-xs-right">
                                            <button type="submit" class="btn btn-info btn-rounded">Add Staff</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection
