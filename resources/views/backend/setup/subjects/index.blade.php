@extends('layouts.master')
@section('title', 'SA Management System | Subjects List')
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
                                <h3 class="box-title">Subjects List</h3>
                                <a href="" data-toggle="modal" data-target="#AddSubject"
                                    class="btn btn-rounded btn-success mb-5" style="float: right">Add New Subject</a>
                            </div>
                            {{-- box-header --}}
                            <div class="box-body">
                                <div class="table-responsive">
                                    <table id="dataTable" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>SL</th>
                                                <th>Subject Name</th>
                                                {{-- <th>Delete</th> --}}
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($subjectData as $Key => $subject)
                                                <tr>
                                                    <td>{{ $Key + 1 }}</td>
                                                    <td>{{ $subject->name }}</td>
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
