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
                                                        <option value=""></option>
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
                                                        <option value=""></option>
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
                                        <button id="loadButton" type="submit"
                                            class="btn btn-info btn-rounded">Load</button>
                                    </div>
                                </form>
                            </div>
                            {{-- box-header --}}
                            <div class="box-body" id="studentTableContainer">
                                <div class="table-responsive">
                                    <form action="{{ route('academics.sba.store') }}" method="post">
                                        @csrf
                                        <table id="dataTable" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>SL</th>
                                                    <th>Name of Student</th>
                                                    <th colspan="4">Class Work</th>
                                                    <th>Class Work Scaled to 50%</th>
                                                    <th>Exams Score 100%</th>
                                                    <th>Exams Score Scaled to 50%</th>
                                                    <th>Total</th>
                                                    <th>Position</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($students as $key => $student)
                                                    <input type="text" name="academicYear[]"
                                                        value="{{ $academicYear->academic_year }}" hidden>
                                                    <input type="text" name="term[]" value="{{ $academicYear->term }}"
                                                        hidden>
                                                    <input type="text" name="subject[]" value="{{ $subjectName }}"
                                                        readonly hidden>

                                                    <input type="text" name="currentClass[]" value="{{ $currentClass }}"
                                                        hidden>
                                                    <tr>
                                                        <td>{{ $key + 1 }}</td>
                                                        <td><input type="text" name="studentName[]"
                                                                value="{{ $student->id }}" readonly
                                                                hidden><span>{{ $student->sur_name . ' ' . $student->other_names }}</span>
                                                        </td>
                                                        <td><input type="number" name="classScore1[]"
                                                                class="classWorkInput" style="width: 50px" min="0"
                                                                max="15">
                                                        </td>
                                                        <td><input type="number" name="classScore2[]"
                                                                class="classWorkInput" style="width: 50px" min="0"
                                                                max="15">
                                                        </td>
                                                        <td><input type="number" name="classScore3[]"
                                                                class="classWorkInput" style="width: 50px" min="0"
                                                                max="15">
                                                        </td>
                                                        <td><input type="number" name="classScore4[]"
                                                                class="classWorkInput" style="width: 50px" min="0"
                                                                max="15">
                                                        </td>
                                                        <td><input type="text" name="totalClassScore[]"
                                                                class="scaledClassWork" style="width: 60px" readonly></td>
                                                        <td><input type="number" name="examScore[]" class="examsScore"
                                                                style="width: 50px" min="0" max="100">
                                                        </td>
                                                        <td><input type="text" name="totalExamScore[]"
                                                                class="scaledExamsScore" style="width: 60px" readonly>
                                                        </td>
                                                        <td><input type="text" name="totalScore[]" class="totalScore"
                                                                style="width: 60px" readonly></td>
                                                        <td><input type="text" name="position[]" class="position"
                                                                style="width: 60px" readonly>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        <div class="text-xs-right">
                                            <button type="submit" class="btn btn-info btn-rounded">Submit
                                                Assessment</button>
                                        </div>
                                    </form>
                                </div>

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

@endsection
