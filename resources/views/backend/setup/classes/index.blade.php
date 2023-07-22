@extends('layouts.master')
@section('title', 'SA Management System | Class List')
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
                                <h3 class="box-title">Class List</h3>
                                <a href="" data-toggle="modal" data-target="#AddClass"
                                    class="btn btn-rounded btn-success mb-5" style="float: right">Add New Class</a>
                            </div>
                            {{-- box-header --}}
                            <div class="box-body">
                                <div class="table-responsive">
                                    <table id="dataTable" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>SL</th>
                                                <th>Name of Class</th>
                                                <th>Form Master</th>
                                                {{-- <th>Update</th>
                                                <th>Delete</th> --}}
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($classData as $Key => $class)
                                                <tr>
                                                    <td>{{ $Key + 1 }}</td>
                                                    <td>{{ $class->current_class }}</td>
                                                    <td>{{ optional($class->formMaster)->sur_name . ' ' . optional($class->formMaster)->other_names }}
                                                    </td>
                                                    {{-- <td>
                                                        <a href="{{ route('students.edit', $class->id) }}"
                                                            class="btn btn-sm btn-warning mb-2"><i
                                                                data-feather="edit"></i></a>
                                                    </td> --}}
                                                    {{-- <td>
                                                        <form method="POST"
                                                            action="{{ route('students.destroy', $class->id) }}">
                                                            @csrf
                                                            <input name="_method" type="hidden" value="DELETE">
                                                            <button type="submit"
                                                                class="btn btn-sm btn-danger mb-2 show_confirm"
                                                                data-toggle="tooltip" title='Delete'><i
                                                                    data-feather="trash"></i></button>
                                                        </form>
                                                    </td> --}}
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
