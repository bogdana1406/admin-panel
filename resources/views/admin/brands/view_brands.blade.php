@extends('layouts.adminLayout.admin_design')

@section('content')

    <div id="content">
        <div id="content-header">
            <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Brands</a> <a href="#" class="current">View Brands</a> </div>
            <h1>Brands</h1>
            @if(Session::has('flash_massage_error'))

                <div class="alert alert-danger alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong> {!! session('flash_massage_error') !!}</strong>
                </div>
            @endif
            @if(Session::has('flash_massage_success'))

                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong> {!! session('flash_massage_success') !!}</strong>
                </div>

            @endif
        </div>
        <div class="container-fluid">
            <hr>
            <div class="row-fluid">
                <div class="span12">
                    <div class="widget-box">
                        <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                            <h5>View Brands</h5>
                        </div>
                        <div class="widget-content nopadding">
                            <table class="table table-bordered data-table">
                                <thead>
                                <tr>
                                    <th>Brand ID</th>
                                    <th>Brand Name</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($brands as $brand)
                                    <tr class="gradeX">
                                        <td>{{ $brand->id }}</td>
                                        <td>{{ $brand->name }}</td>
                                        <td class="center">
                                            <a href="{{ url('/admin/edit-brand/'.$brand->id) }}" class="btn btn-primary btn-mini">Edit</a>
                                            <a data-id="{{$brand->id}}" href="#" class="btn btn-danger btn-mini delBrand">Delete</a></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>


@endsection