@extends('layouts.master')
@section('title', 'SA Management System | Home Page')
@section('content')
    @include('sweetalert::alert')
    {{-- Main Content Starts --}}
    <div class="content-wrapper">
        <div class="container-full">
            @if ($errors)
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger alert-dismissible fade show" role="alert" align="center"><button
                            type="button" class="close" data-dismiss="alert" aria-label="Close" <span
                            aria-hidden="true">&times;</span></button><strong>{{ $error }}</strong>
                    </div>
                @endforeach
            @endif
            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-md-4">
                        <div class="box overflow-hidden pull-up">
                            <div class="box-body">
                                <div class="icon bg-primary-light rounded w-60 h-60">
                                    <i class="text-primary mr-0 font-size-24 mdi mdi-account-multiple"></i>
                                </div>
                                <div>
                                    <p class="text-mute mt-20 mb-0 font-size-16">Male Students</p>
                                    <h3 class="text-white mb-0 font-weight-500">{{ $Males }}</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="box overflow-hidden pull-up">
                            <div class="box-body">
                                <div class="icon bg-warning-light rounded w-60 h-60">
                                    <i class="text-warning mr-0 font-size-24 mdi mdi-account-multiple"></i>
                                </div>
                                <div>
                                    <p class="text-mute mt-20 mb-0 font-size-16">Female Students</p>
                                    <h3 class="text-white mb-0 font-weight-500">{{ $Females }}</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="box overflow-hidden pull-up">
                            <div class="box-body">
                                <div class="icon bg-info-light rounded w-60 h-60">
                                    <i class="text-info mr-0 font-size-24 mdi mdi-account-multiple"></i>
                                </div>
                                <div>
                                    <p class="text-mute mt-20 mb-0 font-size-16">Total Students</p>
                                    <h3 class="text-white mb-0 font-weight-500">{{ $Total }}</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- <a href="{{ route('update') }}">
                        <button type="submit">Update</button>
                    </a> --}}
                    <div class="col-12">
                        <div class="box">
                            {{-- <div class="box-header">
                                <h4 class="box-title align-items-start flex-column">
                                    New Arrivals
                                    <small class="subtitle">More than 400+ new members</small>
                                </h4>
                            </div> --}}
                            <div class="box-body">
                                <div class="table-responsive">
                                    <table id="dataTable" class="table no-border table-striped">
                                        <thead>
                                            <tr class="text-uppercase bg-lightest">
                                                <th><span class="text-white">name of student</span></th>
                                                <th><span class="text-fade">class</span></th>
                                                <th><span class="text-fade">residential status</span></th>
                                                <th><span class="text-fade">guardian contact</span></th>
                                                <th><span class="text-fade">update</span></th>
                                                {{-- <th></th> --}}
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($studentData as $Key => $Student)
                                                <tr>
                                                    <td class="pl-0 py-8">
                                                        <img src="{{ asset('images/studentImages') . '/' . $Student->student_image }}"
                                                            alt="" height="40" width="40"
                                                            class="rounded-circle">
                                                        {{ Str::upper($Student->sur_name) . ' ' . $Student->other_names }}
                                                    </td>
                                                    <td>{{ $Student->current_class }}</td>
                                                    <td>{{ $Student->residential_status }}</td>
                                                    <td>{{ $Student->mobile_number }}</td>
                                                    <td></td>
                                                    {{-- <td></td> --}}
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- /.content -->
        </div>
    </div>
    {{-- Main Content Ends --}}

@endsection
