@extends('layouts.body.app')
@section('title', 'SA Management System | Add Student')
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
                            <h4 class="box-title">Add Student's Details</h4>
                        </div>
                        <div class="box-body">
                            <div class="row">
                                <div class="col">
                                    <form id="studentForm" action="{{ route('students.store') }}" method="post"
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
                                                    <h5>Class <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <select class="form-control js-example-responsive"
                                                            name="current_class"
                                                            style="font-size:20px; width:100%; height: 35px"
                                                            id="select2-input" required>
                                                            <option value="{{ old('current_class') }}">
                                                                {{ old('current_class') }}
                                                            </option>
                                                            @php
                                                                $currentClasses = App\Models\CurrentClass::all();
                                                            @endphp
                                                            <option value=""></option>
                                                            ...
                                                            @foreach ($currentClasses as $currentClass)
                                                                <option value="{{ $currentClass->current_class }}"
                                                                    style="font-size:20px;">
                                                                    {{ $currentClass->current_class }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-control-feedback"></div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Residential Status <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <select name="residential_status" id="select"
                                                            class="form-control">
                                                            <option value="{{ old('residential_status') }}">
                                                                {{ old('residential_status') }}</option>
                                                            <option value="Boarding">Boarding</option>
                                                            <option value="Day">Day</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-control-feedback"></div>
                                                </div>
                                            </div>
                                            {{-- <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Sub Class</h5>
                                                    <div class="controls">
                                                        <select name="sub_class" id="select" class="form-control">
                                                            <option value="{{ old('sub_class') }}">
                                                                {{ old('sub_class') }}</option>
                                                            <option value="A">A</option>
                                                            <option value="B">B</option>
                                                            <option value="C">C</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-control-feedback"></div>
                                                </div>
                                            </div> --}}
                                        </div>
                                        <div class="row">
                                            {{-- <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Residential Status <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <select name="residential_status" id="select"
                                                            class="form-control">
                                                            <option value="{{ old('residential_status') }}">
                                                                {{ old('residential_status') }}</option>
                                                            <option value="Boarding">Boarding</option>
                                                            <option value="Day">Day</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-control-feedback"></div>
                                                </div>
                                            </div> --}}
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>House <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <select name="house" id="select" class="form-control" required>
                                                            <option value="{{ old('house') }}">{{ old('house') }}
                                                            </option>
                                                            @foreach ($houseData as $House)
                                                                <option value="{{ $House->house }}">
                                                                    {{ $House->house }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-control-feedback"></div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Name of Guardian/Parent</h5>
                                                    <div class="controls">
                                                        <input type="text" name="name_of_guardian"
                                                            class="form-control" value="{{ old('name_of_guardian') }}"
                                                            required>
                                                    </div>
                                                    <div class="form-control-feedback"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            {{-- <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Name of Guardian/Parent</h5>
                                                    <div class="controls">
                                                        <input type="text" name="name_of_guardian"
                                                            class="form-control" value="{{ old('name_of_guardian') }}"
                                                            required>
                                                    </div>
                                                    <div class="form-control-feedback"></div>
                                                </div>
                                            </div> --}}
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Contact of Guardian/Parent</h5>
                                                    <div class="controls">
                                                        <input type="text" name="contact_number" class="form-control"
                                                            value="{{ old('contact_number') }}" required>
                                                    </div>
                                                    <div class="form-control-feedback"></div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="controls">
                                                    <div class="mb-4">
                                                        <img id="showImage"
                                                            src="{{ asset('images/studentImages/avatar.png') }}"
                                                            width="120" height="90" alt="Student Image"><br>
                                                        <input type="file" id="actual-btn" class="form-control-file"
                                                            name="student_image" hidden>
                                                        <label for="actual-btn"
                                                            style="background-color: indigo; color:white; padding:0.5rem; border-radius:0.3rem; cursor:pointer; margin-top:1rem;">Choose
                                                            Student Image</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            {{-- <div class="col-md-6">
                                                <div class="controls">
                                                    <div class="mb-4">
                                                        <img id="showImage"
                                                            src="{{ asset('images/studentImages/avatar.png') }}"
                                                            width="120" height="90" alt="Student Image"><br>
                                                        <input type="file" id="actual-btn" class="form-control-file"
                                                            name="student_image" hidden>
                                                        <label for="actual-btn"
                                                            style="background-color: indigo; color:white; padding:0.5rem; border-radius:0.3rem; cursor:pointer; margin-top:1rem;">Choose
                                                            Student Image</label>
                                                    </div>
                                                </div>
                                            </div> --}}
                                        </div>
                                        <div class="text-xs-right">
                                            <button type="submit" class="btn btn-info btn-rounded">Add Student</button>
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
