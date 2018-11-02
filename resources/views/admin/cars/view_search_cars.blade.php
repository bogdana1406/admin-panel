@extends('layouts.adminLayout.admin_design')
@section('content')

    <div id="content">
        <div id="content-header">
            <div id="breadcrumb">  <a href="#">Cars</a> <a href="#" class="current">Choose Car</a> </div>
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
        <div class="container-fluid"><hr>
            <div class="row-fluid">
                <div class="span12">
                    <div class="widget-box">
                        <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
                            <h5>Add Car</h5>
                        </div>
                        <div class="widget-content nopadding">
                            <form enctype="multipart/form-data" class="form-horizontal" method="post" action="{{ url('/admin/search-cars') }}"
                                  name="add_car" id="add_car" novalidate="novalidate"> {{ csrf_field() }}
                                {{--<div class="control-group">--}}
                                    {{--<label class="control-label">Car name</label>--}}
                                    {{--<div class="controls">--}}
                                        {{--<select name="name" style="width: 220px">--}}
                                            {{--<option>Select Car Name</option>--}}
                                            {{--@foreach ($carDetails as $carDetail)--}}
                                                {{--<option value="{{ $carDetail->name }}">{{ $carDetail->name }}</option>--}}
                                            {{--@endforeach--}}
                                        {{--</select>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                <div class="control-group">
                                    <label class="control-label">Brand</label>
                                    <div class="controls">
                                        <select name="brand_id" style="width: 220px">
                                            <option value="false">All Brands</option>
                                            @foreach ($carBrands as $id=>$name)
                                                <option value="{{ $id }}">{{ $name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Model</label>
                                    <div class="controls">
                                        <select name="model" style="width: 220px">
                                            <option value="false">All Models</option>
                                            @foreach ($carModels as $carModel)
                                                <option value="{{ $carModel }}">{{ $carModel }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Seats</label>
                                    <div class="controls">
                                        <select name="seats" style="width: 220px">
                                            <option value="false">How many Seats</option>
                                            @foreach ($carSeats as $carSeat)
                                                <option value="{{ $carSeat }}">{{ $carSeat }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Doors</label>
                                    <div class="controls">
                                        <select name="doors" style="width: 220px">
                                            <option value="false">How many Doors</option>
                                            @foreach ($carDoors as $carDoor)
                                                <option value="{{ $carDoor }}">{{ $carDoor }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">TransmissionType</label>
                                    <div class="controls">
                                        <select name="transmission_types" style="width: 220px">
                                            <option value="false">All Transmission Types</option>
                                            @foreach ($carTransmissionTypes as $carTransmissionType)
                                                <option value="{{ $carTransmissionType }}">{{ $carTransmissionType }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Year</label>
                                    <div class="controls">
                                        <select name="year" style="width: 220px">
                                            <option value="false">All Years</option>
                                            @foreach ($carYears as $carYear)
                                                <option value="{{ $carYear }}">{{ $carYear }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Engine</label>
                                    <div class="controls">
                                        <select name="engine_id" style="width: 220px">
                                            <option value="false">All Engines</option>
                                            @foreach ($carEngines as $id=>$name)
                                                <option value="{{ $id }}">{{ $name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-actions">
                                    <input type="submit" value="Applay Filter" class="btn btn-success">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection