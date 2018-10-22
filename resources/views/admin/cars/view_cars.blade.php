@extends('layouts.adminLayout.admin_design')
@section('content')

    <div id="content">
        <div id="content-header">
            <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom">
                    <i class="icon-home"></i> Home</a> <a href="#">Cars</a> <a href="#" class="current">View Cars</a> </div>
            <h1>Cars</h1>
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
                            <h5>View Cars</h5>
                        </div>
                        <div class="widget-content nopadding">
                            <table class="table table-bordered data-table">
                                <thead>
                                <tr>
                                    <th>Car ID</th>
                                    <th>Car brand</th>
                                    <th>Car model</th>
                                    <th>Seats</th>
                                    <th>Doors</th>
                                    <th>Transmission_type</th>
                                    <th>Year</th>
                                    <th>Engine</th>
                                    <th>Price</th>
                                    <th>Image</th>
                                    <th>Actions</th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach($cars as $car)
                                    <tr class="gradeX">
                                        <td>{{ $car->id }}</td>
                                        <td>{{ $car->brand->name }}</td>
                                        <td>{{ $car->model }}</td>
                                        <td>{{ $car->seats }}</td>
                                        <td>{{ $car->doors }}</td>
                                        <td>{{ $car->transmission_types }}</td>
                                        <td>{{ $car->year }}</td>
                                        <td>{{ $car->engine->name }}</td>
                                        <td>{{ $car->price }}</td>
                                        <td>
                                            @if(!empty($car->image))
                                                <img src="{{ asset('/images/backend_images/cars/small/'.$car->image) }}" style="width:50px;">
                                                @endif
                                        </td>
                                        <td class="center">
                                            <a href="{{ url('/admin/edit-car/'.$car->id) }}" class="btn btn-primary btn-mini">Edit</a>
                                            <a data-id="{{$car->id}}" href="#" class="btn btn-danger btn-mini delCat">Delete</a></td>
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