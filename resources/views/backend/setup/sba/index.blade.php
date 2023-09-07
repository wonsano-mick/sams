@extends('layouts.master')
@section('title', 'SA Management System | Continuous Assessment')
@section('content')

    @include('sweetalert::alert')
    {{-- Content Wrapper. Contains page content --}}
    <div class="content-wrapper">
        <div class="container-full">
            {{-- Main content --}}
            <section class="content">
                <div class="row">
                    <div class="col-12">
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
                            <div class="box-body">
                                <form id="studentForm" action="{{ route('academics.sba.load') }}" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Class <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <select name="current_class" class="form-control" required>
                                                        <option value="">Select Class</option>
                                                        @foreach ($groupedClasses as $class => $subjects)
                                                            <option value="{{ $class }}">{{ $class }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Subject <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <select name="subj_name" class="form-control" required>
                                                        <option value="">Select Subject</option>
                                                        @foreach ($uniqueSubjects as $subject)
                                                            <option value="{{ $subject->name }}">{{ $subject->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-control-feedback"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Academic Year <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="academic_year" class="form-control"
                                                        value="{{ $academicYear->academic_year }}" autocomplete required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Term<span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="term" class="form-control"
                                                        value="{{ $academicYear->term }}" autocomplete required>
                                                </div>
                                                <div class="form-control-feedback"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-xs-right">
                                        <button type="submit" class="btn btn-info btn-rounded">Load</button>
                                    </div>
                                </form>
                            </div>
                            {{-- box-header --}}
                            <div class="box-body" id="studentTableContainer">
                                @include('backend.setup.sba.student_table')
                            </div>
                            {{-- box-body --}}
                        </div>
                        {{-- box --}}

                    </div>
                    {{-- col --}}
                </div>
                {{-- row --}}
            </section>
            {{-- content --}}

        </div>
    </div>
    {{-- content-wrapper --}}
    {{-- <script>
        $(document).ready(function() {
            // Load the initial student table
            loadStudentTable();

            $('form#studentForm').on('submit', function(event) {
                event.preventDefault();
                var formData = $(this).serialize();

                $.ajax({
                    url: '{{ route('academics.load.student.table') }}',
                    method: 'POST',
                    data: formData,
                    success: function(response) {
                        $('#studentTableContainer').html(response);
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            });
        });

        function loadStudentTable() {
            $.ajax({
                url: '{{ route('academics.load.student.table') }}',
                method: 'POST',
                success: function(response) {
                    $('#studentTableContainer').html(response);
                },
                error: function(error) {
                    console.log(error);
                }
            });
        }
    </script> --}}
@endsection
