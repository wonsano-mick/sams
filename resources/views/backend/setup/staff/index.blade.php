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
                                <a href="{{ route('staff.subjects') }}" class="btn btn-rounded btn-danger mb-5"
                                    style="">Assign Staff Subjects</a>
                                <a href="{{ route('staff.create') }}" class="btn btn-rounded btn-success mb-5"
                                    style="float: right">Add Staff</a>
                            </div>
                            {{-- box-header --}}
                            <div class="box-body">
                                <div class="table-responsive">
                                    <table id="dataTable" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>SL</th>
                                                <th>Name of Staff</th>
                                                <th>Gender</th>
                                                <th>Contact Number</th>
                                                <th>Update</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($staffData as $Key => $staff)
                                                <tr>
                                                    <td>{{ $Key + 1 }}</td>
                                                    <td>
                                                        <img src="{{ asset('images/staffImages') . '/' . $staff->staff_image }}"
                                                            alt="" height="40" width="40"
                                                            class="rounded-circle">
                                                        {{ Str::upper($staff->sur_name) . ' ' . $staff->other_names }}
                                                    </td>
                                                    <td>{{ $staff->gender }}</td>
                                                    <td>{{ $staff->mobile_number }}</td>
                                                    <td>
                                                        <a href="{{ route('staff.edit', $staff->id) }}"
                                                            class="btn btn-sm btn-warning mb-2"><i
                                                                data-feather="edit"></i></a>
                                                    </td>
                                                    <td>
                                                        <form method="POST"
                                                            action="{{ route('staff.destroy', $staff->id) }}">
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
