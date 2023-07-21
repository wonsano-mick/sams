@extends('layouts.master')
@section('title', 'SA Management System | Student List')
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
                            <div class="box-header with-border">
                                <h4 class="box-title">List of Assigned Subjects to Staff</h4>
                                <a href="{{ route('staff.subjects') }}" class="btn btn-rounded btn-danger mb-5"
                                    style="float: right">Assign Staff Subjects</a>
                            </div>
                            {{-- box-header --}}
                            <div class="box-body">
                                <div class="table-responsive">
                                    <table id="dataTable" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>SL</th>
                                                <th>Name of Staff</th>
                                                <th>Class</th>
                                                <th>Subject</th>
                                                <th>Update</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($staffSubjects as $Key => $staffSubject)
                                                @php
                                                    $nameOfStaff = $staffSubject->staff->sur_name . ' ' . $staffSubject->staff->other_names;
                                                    $currentClass = $staffSubject->currentClass->current_class;
                                                    $subjectName = $staffSubject->subject->name;
                                                @endphp
                                                <tr>
                                                    <td>{{ $Key + 1 }}</td>
                                                    <td>
                                                        <img src="{{ asset('images/staffImages') . '/' . $staffSubject->staff->staff_image }}"
                                                            alt="" height="40" width="40"
                                                            class="rounded-circle">
                                                        {{ ucwords($nameOfStaff) }}
                                                    </td>
                                                    <td>{{ $currentClass }}</td>
                                                    <td>{{ $subjectName }}</td>
                                                    <td>
                                                        <a href="{{ route('staff.subject.edit', $staffSubject->id) }}"
                                                            class="btn btn-sm btn-warning mb-2"><i
                                                                data-feather="edit"></i></a>
                                                    </td>
                                                    <td>
                                                        <form method="POST"
                                                            action="{{ route('staff.subject.destroy', $staffSubject->id) }}">
                                                            @csrf
                                                            <input name="_method" type="hidden" value="DELETE">
                                                            <button type="submit"
                                                                class="btn btn-sm btn-danger mb-2 show_confirm"
                                                                data-toggle="tooltip" title='Delete'><i
                                                                    data-feather="trash"></i></button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                            </tr>
                                        </tfoot>
                                    </table>
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
