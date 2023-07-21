@extends('layouts.body.app')
@section('title', 'SHS System | Items List')
@section('content')
    @include('sweetalert::alert')
    {{-- Begin Page Content --}}
    <div class="container-fluid">
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
                                    <h3 class="box-title mb-5">Items List</h3>
                                    <div class="row mt-5">
                                        <div class="col-md-4">
                                            <button type="button" data-toggle="modal" data-target="#releaseItem"
                                                class="btn btn-rounded btn-danger mb-5">Release Item</button>
                                        </div>
                                        <div class="col-md-4">
                                            <a href="{{ route('users.add') }}"
                                                class="btn btn-rounded btn-warning mb-5">Report
                                                Item</a>
                                        </div>
                                        <div class="col-md-4">
                                            <a href="{{ route('users.add') }}"
                                                class="btn btn-rounded btn-danger mb-5">Release
                                                Item</a>
                                        </div>
                                    </div>
                                </div>
                                {{-- box-header --}}
                                <div class="box-body">
                                    <div class="table-responsive">
                                        <table id="dataTable" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>SL</th>
                                                    <th>Name of Item</th>
                                                    <th>Quanity in Store</th>
                                                    <th>Quantity in Use</th>
                                                    <th>Quantity Unsuable</th>
                                                    <th>Total Stock</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($allData as $Key => $Item)
                                                    <tr>
                                                        <td>{{ $Key + 1 }}</td>
                                                        <td>{{ $Item->name_of_item }}</td>
                                                        <td style="text-align: center">{{ $Item->items_in_store }}</td>
                                                        <td style="text-align: center">{{ $Item->items_in_use }}</td>
                                                        <td style="text-align: center">{{ $Item->items_unusable }}</td>
                                                        <td style="text-align: center">
                                                            {{ $Item->items_in_store + $Item->items_in_use }}</td>
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
