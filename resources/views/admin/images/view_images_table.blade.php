@extends('layouts.adminLayout.admin_design')
@section('content')

    <div id="content">
        <div id="content-header">
            <div id="breadcrumb"> <a href="#">Images</a> <a href="#" class="current">View Cars Images</a> </div>
            <h1>Images</h1>
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
                                    <th>Car model</th>
                                    <th>Image</th>
                                    <th>Actions</th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach($carsImages as $carsImage)
                                    <tr class="gradeX">
                                        <td>{{ $carsImage->car->id }}</td>
                                        <td>{{ $carsImage->car->model }}</td>
                                        <td>
                                            @if(!empty($carsImage->filename))
                                                <img src="{{ asset('/storage/'.$carsImage->filename) }}" style="width:50px;">
                                                {{--src="{{ asset('/images/backend_images/cars/small/'.$car->image) }}"--}}
                                            @endif
                                        </td>
                                        <td class="center">
                                            {{--<div class="fr"><a href="#" class="btn btn-success btn-mini">View</a>--}}
                                                {{--<a href="{{ url('/admin/edit-car/'.$car->id) }}" class="btn btn-primary btn-mini">Edit</a>--}}
                                                {{--<a rel="{{ $carsImage->id }}" rel1="delete-car-image"--}}
                                                {{--href="javascript:"--}}
                                                {{--class="btn btn-danger btn-mini deleteRecord">Delete</a>--}}

                                                <a data-id="{{$carsImage->id}}" href="#" class="btn btn-danger btn-mini delCarsImageRecord">Delete</a>

                                        </td>
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