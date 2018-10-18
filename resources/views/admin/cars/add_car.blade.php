@extends('layouts.adminLayout.admin_design')
@section('content')

    <div id="content">
        <div id="content-header">
            <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Cars</a> <a href="#" class="current">Add Car</a> </div>
            <h1>Cars</h1>
        </div>
        <div class="container-fluid"><hr>
            <div class="row-fluid">
                <div class="span12">
                    <div class="widget-box">
                        <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
                            <h5>Add Car</h5>
                        </div>
                        <div class="widget-content nopadding">
                            <form class="form-horizontal" method="post" action="{{ url('/admin/add-car') }}" name="add_car" id="add_car" novalidate="novalidate"> {{ csrf_field() }}
                                    <div class="control-group">
                                        <label class="control-label">Brand</label>
                                        <div class="controls">
                                            <select name="brand_id" style="width: 220px">
                                                <option>Select Brand</option>
                                                @foreach ($brands as $id=>$name)
                                                    <option value="{{$id}}">{{ $name }}</option>
                                                @endforeach
                                            </select>
                                            @if($errors->has('brand_id'))
                                                <span class="alert alert-danger" role="alert">
                                              {{$errors->first('brand_id')}}
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                <div class="control-group">
                                    <label class="control-label">Model</label>
                                    <div class="controls">
                                        <input type="text" name="model" id="model">
                                        @if($errors->has('model'))
                                            <span class="alert alert-danger" role="alert">
                                              {{$errors->first('model')}}
                                            </span>
                                        @endif
                                    </div>

                                </div>
                                <div class="control-group">
                                    <label class="control-label">Seats</label>
                                    <div class="controls">
                                        <input type="text" name="seats" id="seats">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Doors</label>
                                    <div class="controls">
                                        <input type="text" name="doors" id="doors">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Transmission_types</label>
                                    <div class="controls">
                                        <select name="transmission_type" style="width: 220px">
                                            <option>Select Transmission_type</option>
                                            <option>automatic</option>
                                            <option>manual</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Year</label>
                                    <div class="controls">
                                        <input type="text" name="year" id="year">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Engine</label>
                                    <div class="controls">
                                        <select name="engine_id" style="width: 220px">
                                            <option>Select Engine</option>
                                            @foreach ($engines as $id=>$name)
                                                <option value="{{$id}}">{{ $name }}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('engine_id'))
                                            <span class="alert alert-danger" role="alert">
                                              {{$errors->first('engine_id')}}
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Price</label>
                                    <div class="controls">
                                        <input type="text" name="price" id="price">
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">About</label>
                                    <div class="controls">
                                        <textarea type="text" name="about" id="about"></textarea>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">Description</label>
                                    <div class="controls">
                                        <textarea type="text" name="description" id="description"></textarea>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Image</label>
                                    <div class="controls">
                                        <input type="file" name="image" id="image">
                                    </div>
                                </div>
                                <div class="form-actions">
                                    <input type="submit" value="Add Car" class="btn btn-success">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection