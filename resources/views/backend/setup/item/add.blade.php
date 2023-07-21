@extends('layouts.master')
@section('title', 'SHS System | Add Student')
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
                            <h4 class="box-title">Add Item(s) Submitted by
                                {{ $studentData->sur_name . ' ' . $studentData->other_names }}</h4>
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
                                    <form action="{{ route('items.store.items') }}" method="post"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <input type="text" name="student_id" value="{{ $studentData->id }}" hidden>
                                        <div class="row">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        {{-- <th></th> --}}
                                                        <th style="min-width: 220px;">Name of Item<span
                                                                style="color: red">*</span></th>
                                                        <th>Quantity<span style="color: red">*</span></th>
                                                        <th><a href="#" class="btn btn-sm btn-success add_more"><i
                                                                    data-feather="plus-circle"></i></a></th>
                                                    </tr>
                                                </thead>
                                                <tbody class="addMoreItem">
                                                    <tr>
                                                        {{-- <th>1</th> --}}
                                                        <th>
                                                            <select name="item_id[]" id="item_id"
                                                                class="form-control item_id">
                                                                <option value="">Select Item</option>
                                                                @foreach ($Items as $Item)
                                                                    <option value="{{ $Item->id }}">
                                                                        {{ $Item->name_of_item }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </th>
                                                        <th>
                                                            <input type="number" min="0"
                                                                class="form-control quantity" name="quantity[]"
                                                                id="quantity">
                                                        </th>
                                                        <th><a href="#" class="btn btn-sm btn-danger"><i
                                                                    data-feather="minus-circle"></i></a></th>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="text-xs-right">
                                            <button type="submit" class="btn btn-info btn-rounded">Add Items</button>
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
