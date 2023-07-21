@extends('layouts.master')
@section('title', 'SHS System | ' . $title)
@section('content')

    {{-- Content Wrapper. Contains page content --}}
    <div class="wrapper">
        {{-- Content Wrapper. Contains page content --}}
        <div class="content-wrapper">
            <div class="container-full">
                {{-- Main content --}}
                <section class="content">
                    {{-- Basic Forms --}}
                    @if ($errors)
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger alert-dismissible fade show" role="alert" align="center"><button
                                    type="button" class="close" data-dismiss="alert" aria-label="Close" <span
                                    aria-hidden="true">&times;</span></button><strong>{{ $error }}</strong></div>
                        @endforeach
                    @endif
                    <div class="box">
                        <div class="box-header with-border">
                            <h4 class="box-title">Add Category</h4>
                        </div>
                        {{-- box-header --}}
                        <div class="box-body">
                            <div class="row">
                                <div class="col">
                                    <form action="{{ route('categories.store') }}" method="post">
                                        @csrf
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <h5>Category</h5>
                                                    <div class="controls">
                                                        <input type="text" name="category" class="form-control"
                                                            value="{{ old('category') }}" autocomplete>
                                                    </div>
                                                    <div class="form-control-feedback"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-xs-right">
                                            <button type="submit" class="btn btn-success btn-rounded">Add Category</button>
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
