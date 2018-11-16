@extends('layouts.adminLayout.admin_design')
@section('content')

    <div id="content">
        <div id="content-header">
            <div id="breadcrumb"> <a href="#">Reviews</a> <a href="#" class="current">Edit Review</a> </div>
            <h1>Reviews</h1>
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
                            <h5>Edit Review</h5>
                        </div>
                        <div class="widget-content nopadding">
                            <form enctype="multipart/form-data" class="form-horizontal" method="post" action="{{ url('/admin/edit-review/'.$reviewDetails->id) }}"
                                  name="edit_review" id="edit_review" novalidate="novalidate"> {{ csrf_field() }}

                                <div class="control-group">
                                    <label class="control-label">Review ID</label>
                                    <div class="controls">
                                        <input type="text" readonly name="id" id="id" value="{{ $reviewDetails->id }}">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Customer Name</label>
                                    <div class="controls">
                                        <input type="text" name="customer_name" id="customer_name" value="{{old('customer_name') ?? $reviewDetails->customer_name }}">
                                        @if($errors->has('customer_name'))
                                            <span class="alert alert-danger" role="alert">
                                              {{$errors->first('customer_name')}}
                                            </span>
                                        @endif.
                                    </div>

                                </div>
                                <div class="control-group">
                                    <label class="control-label">Link to facebook</label>
                                    <div class="controls">
                                        <input type="text" name="customer_link" id="customer_link" value="{{old('customer_link') ?? $reviewDetails->customer_link }}">
                                        @if($errors->has('customer_link'))
                                            <span class="alert alert-danger" role="alert">
                                              {{$errors->first('customer_link')}}
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Published on</label>
                                    <div class="controls">
                                        <input type="date" name="published_at" id="published_at" value="{{old('published_at')??$reviewDetails->published_at }}">
                                        @if($errors->has('published_at'))
                                            <span class="alert alert-danger" role="alert">
                                              {{$errors->first('published_at')}}
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">Text Review</label>
                                    <div class="controls">
                                        <textarea type="text" rows="10" cols="45" name="text_review" id="text_review">{{ old('text_review')?? $reviewDetails->text_review }}</textarea>
                                        @if($errors->has('text_review'))
                                            <span class="alert alert-danger" role="alert">
                                              {{$errors->first('text_review')}}
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Mark Review</label>
                                    <div class="controls">
                                        <input type="text" name="mark_review" id="mark_review" value="{{ old('mark_review')??$reviewDetails->mark_review }}">
                                        @if($errors->has('mark_review'))
                                            <span class="alert alert-danger" role="alert">
                                              {{$errors->first('mark_review')}}
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Castomer's Photo</label>
                                    <div class="controls">
                                        <input type="file" name="photo" id="photo">
                                        <input type="hidden" name="current_photo" value="{{$reviewDetails->customer_photo}}">
                                        @if(!empty($reviewDetails->customer_photo))
                                            <img src="{{ asset($reviewDetails->customer_photo) }}" style="width:30px;">|
                                            <a href="{{ url('/admin/delete-review-image/'.$reviewDetails->id) }}">Delete</a>
                                        @endif
                                    </div>
                                </div>
                                {{--<a href="{{ url('/admin/upload-car-images/'.$carDetails->id) }}" class="btn btn-primary btn-mini">Upload Images</a>--}}

                                <div class="form-actions">
                                    <input type="submit" value="Edit Review" class="btn btn-success">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection