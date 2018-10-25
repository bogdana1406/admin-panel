@extends('layouts.adminLayout.admin_design')
@section('content')

    <div id="content">
        <div id="content-header">
            <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom">
                    <i class="icon-home"></i> Home</a> <a href="#">Cars</a> <a href="#" class="current">Add Car</a> </div>
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
                            <form enctype="multipart/form-data" class="form-horizontal" method="post" action="{{ url('/admin/add-car') }}"
                                  name="add_car" id="add_car" novalidate="novalidate"> {{ csrf_field() }}
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
                                        <input type="text" name="model" id="model" value="{{old('model')}}">
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
                                        <input type="text" name="seats" id="seats" value="{{old('seats')}}">
                                        @if($errors->has('seats'))
                                            <span class="alert alert-danger" role="alert">
                                              {{$errors->first('seats')}}
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Doors</label>
                                    <div class="controls">
                                        <input type="text" name="doors" id="doors" value="{{old('doors')}}">
                                        @if($errors->has('doors'))
                                            <span class="alert alert-danger" role="alert">
                                              {{$errors->first('doors')}}
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Transmission_types</label>
                                    <div class="controls">
                                        <select name="transmission_types" style="width: 220px">
                                            <option>Select Transmission_type</option>
                                            <option>automatic</option>
                                            <option>manual</option>
                                        </select>
                                        @if($errors->has('transmission_types'))
                                            <span class="alert alert-danger" role="alert">
                                              {{$errors->first('transmission_types')}}
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Year</label>
                                    <div class="controls">
                                        <input type="text" name="year" id="year" value="{{old('year')}}">
                                        @if($errors->has('year'))
                                            <span class="alert alert-danger" role="alert">
                                              {{$errors->first('year')}}
                                            </span>
                                        @endif
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
                                        <input type="text" name="price" id="price" value="{{old('price')}}">
                                        @if($errors->has('price'))
                                            <span class="alert alert-danger" role="alert">
                                              {{$errors->first('price')}}
                                            </span>
                                        @endif
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