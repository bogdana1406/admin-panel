@extends('layouts.adminLayout.admin_design')
@section('content')

    <div id="content">
        <div id="content-header">
            <div id="breadcrumb"> <a href="#">Images</a> <a href="#" class="current">Edit Images</a> </div>
            <h1>Images</h1>

        </div>
        <div class="container-fluid"><hr>
            <div class="row-fluid">
                <div class="span12">
                    <div class="widget-box">
                        <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
                            <h5>Edit Images Gallery</h5>
                        </div>
                        <div class="widget-content nopadding">

                            <form action="{{ url('/admin/upload-car-images-form') }}" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}

                                <div class="control-group">
                                    <br /><br />
                                    @if (count($errors) > 0)
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    @endif
                                    <label class="control-label">Car Name</label>
                                    <br /><br />

                                    <div class="controls">
                                        <select name="car_id" id="car_id" style="width: 220px">
                                            <option>Select Car</option>
                                            @foreach ($carDetails as $id=>$name)
                                                <option value="{{ $id }}">{{ $name }}</option>
                                            @endforeach
                                        </select>

                                        @if($errors->has('car_id'))
                                            <span class="alert alert-danger" role="alert">
                                             {{$errors->first('car_id')}}
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <br /><br />
                                <input type="file" name="images[]" multiple />
                                <br /><br />
                                <input type="submit" value="Upload" />
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

