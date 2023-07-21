@extends('layouts.master')
@section('title', 'SA Management System | Add Staff Subjects')
@section('content')
    @include('sweetalert::alert')
    {{-- Content Wrapper. Contains page content --}}
    <div class="wrapper">
        {{-- <!-- Content Wrapper. Contains page content --}}
        <div class="content-wrapper">
            <div class="container-full">
                {{-- <!-- Main content --}}
                <section class="content">
                    {{-- Basic Forms --}}
                    <div class="box">
                        <div class="box-header with-border">
                            <h4 class="box-title">Assign Subjects to Staff</h4>
                        </div>
                        {{-- box-header --}}
                        <div class="box-body">
                            <div class="row">
                                <div class="col">
                                    @if ($errors)
                                        @foreach ($errors->all() as $error)
                                            <div class="alert alert-danger alert-dismissible fade show" role="alert"
                                                align="center"><button type="button" class="close" data-dismiss="alert"
                                                    aria-label="Close" <span
                                                    aria-hidden="true">&times;</span></button><strong>{{ $error }}</strong>
                                            </div>
                                        @endforeach
                                    @endif
                                    <form action="{{ route('staff.subjects.store') }}" method="post"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-12">
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th style="min-width: 220px;">Name of Staff<span
                                                                    style="color: red">*</span></th>
                                                            <th>Class<span style="color: red">*</span></th>
                                                            <th>Subject<span style="color: red">*</span></th>
                                                            <th>
                                                                <button type="button"
                                                                    class="btn btn-sm btn-success add_more">
                                                                    <i data-feather="plus-circle"></i>
                                                                </button>
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="addMoreSubject">
                                                        <tr>
                                                            <td>
                                                                <select name="staff_id[]"
                                                                    class="form-control staff_id select2-input" required>
                                                                    <option value="">Select Staff</option>
                                                                    @foreach ($staffData as $staff)
                                                                        <option value="{{ $staff->id }}">
                                                                            {{ ucwords($staff->sur_name . ' ' . $staff->other_names) }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </td>
                                                            <td>
                                                                <select name="class_id[]"
                                                                    class="form-control class_id select2-input" required>
                                                                    <option value="">Select Class</option>
                                                                    @foreach ($classData as $class)
                                                                        <option value="{{ $class->id }}">
                                                                            {{ $class->current_class }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </td>
                                                            <td>
                                                                <select name="subject_id[]"
                                                                    class="form-control subject_id select2-input" required>
                                                                    <option value="">Select Subject</option>
                                                                    @foreach ($subjectsData as $subject)
                                                                        <option value="{{ $subject->id }}">
                                                                            {{ $subject->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </td>
                                                            <td>
                                                                <button type="button" class="btn btn-sm btn-danger delete"
                                                                    disabled>
                                                                    <i data-feather="minus-circle"></i>
                                                                </button>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="text-xs-right">
                                            <button type="submit" class="btn btn-info btn-rounded">Add Staff
                                                Subjects</button>
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
