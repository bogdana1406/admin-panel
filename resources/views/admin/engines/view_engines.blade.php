@extends('layouts.adminLayout.admin_design')

@section('content')

    <div id="content">
        <div id="content-header">
            <div id="breadcrumb">  <a href="#">Engines</a> <a href="#" class="current">View Engines</a> </div>
            <h1>Engines</h1>
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
                            <h5>View Engines</h5>
                        </div>
                        <div class="widget-content nopadding">
                            <table class="table table-bordered data-table">
                                <thead>
                                <tr>
                                    <th>Engine ID</th>
                                    <th>Engine Name</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($engines as $engine)
                                    <tr class="gradeX">
                                        <td>{{ $engine->id }}</td>
                                        <td>{{ $engine->name }}</td>
                                        <td class="center">
                                            <a href="{{ url('/admin/edit-engine/'.$engine->id) }}" class="btn btn-primary btn-mini">Edit</a>
                                            <a data-id="{{$engine->id}}" href="#" class="btn btn-danger btn-mini delEng">Delete</a></td>
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