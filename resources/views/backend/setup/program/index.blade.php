@extends('layouts.master')
@section('title', 'SA Management System| Programs')
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
                                <h3 class="box-title">Programs List</h3>

                                <button type="button" data-toggle="modal" data-target="#AddProgram"
                                    class="btn btn-rounded btn-success mb-5" style="float: right">Add New Program</button>
                            </div>
                            {{-- box-header --}}
                            <div class="box-body">
                                <div class="table-responsive">
                                    <table id="dataTable" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>SL</th>
                                                <th>Program</th>
                                                <th>Update</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($allData as $Key => $Program)
                                                <tr>
                                                    <td>{{ $Key + 1 }}</td>
                                                    <td>{{ $Program->program }}</td>
                                                    <td>
                                                        <a href="{{ route('programs.edit', $Program->id) }}"
                                                            class="btn btn-md btn-warning mb-2"><i data-feather="edit"></i>
                                                            Update</a>
                                                    </td>
                                                    <td>
                                                        <form method="POST"
                                                            action="{{ route('programs.delete', $Program->id) }}">
                                                            @csrf
                                                            <input name="_method" type="hidden" value="DELETE">
                                                            <button type="submit"
                                                                class="btn btn-md btn-danger mb-2 show_confirm"
                                                                data-toggle="tooltip" title='Delete'><i
                                                                    data-feather="trash"></i>Delete</button>
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
