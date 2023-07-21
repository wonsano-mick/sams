@extends('layouts.master')
@section('title', 'SHS System | Student List')
@section('content')

    @include('sweetalert::alert')
    {{-- Content Wrapper. Contains page content --}}
    <div class="content-wrapper">
        <div class="container-full">
            {{-- Main content --}}
            <section class="content">
                <div class="row">
                    <div class="col-12">
                        @if ($errors)
                            @foreach ($errors->all() as $error)
                                <div class="alert alert-danger alert-dismissible fade show" role="alert" align="center">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close" <span
                                        aria-hidden="true">&times;</span></button><strong>{{ $error }}</strong>
                                </div>
                            @endforeach
                        @endif
                        <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title">Student List</h3>
                            </div>
                            {{-- box-header --}}
                            <div class="box-body">
                                <div class="table-responsive">
                                    <table id="dataTable" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>SL</th>
                                                <th>Name of Student</th>
                                                <th>Class</th>
                                                <th>Residential Status</th>
                                                <th>Receive Item(s)</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($studentData as $Key => $Student)
                                                <tr>
                                                    <td>{{ $Key + 1 }}</td>
                                                    <td>
                                                        <img src="{{ asset('images/studentImages') . '/' . $Student->student_image }}"
                                                            alt="" height="40" width="40"
                                                            class="rounded-circle">
                                                        {{ Str::upper($Student->sur_name) . ' ' . $Student->other_names }}
                                                    </td>
                                                    <td>{{ $Student->actual_class }}</td>
                                                    <td>{{ $Student->residential_status }}</td>
                                                    <td>
                                                        <a href="{{ route('items.add', $Student->id) }}"
                                                            class="btn btn-md btn-success mb-2"><i
                                                                data-feather="check"></i></a>
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
