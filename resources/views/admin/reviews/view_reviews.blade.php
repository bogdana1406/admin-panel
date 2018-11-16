@extends('layouts.adminLayout.admin_design')
@section('content')

    <div id="content">
        <div id="content-header">
            <div id="breadcrumb"> <a href="#">Reviews</a> <a href="#" class="current">View Reviews</a> </div>
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
                                    <th>Review ID</th>
                                    <th>Customer name</th>
                                    <th>Link to facebook</th>
                                    <th>Published on</th>
                                    <th>Text Review</th>
                                    <th>Mark Review</th>
                                    <th>Photo</th>
                                    <th>Actions</th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach($reviews as $review)
                                    <tr class="gradeX">
                                        <td>{{ $review->id }}</td>
                                        <td>{{ $review->customer_name }}</td>
                                        <td>{{ $review->customer_link }}</td>
                                        <td>{{ $review->published_at }}</td>
                                        <td>{{ $review->text_review }}</td>
                                        <td>{{ $review->mark_review }}</td>
                                        <td>
                                            @if(!empty($review->customer_photo))
                                                <img src="{{ asset($review->customer_photo) }}" style="width:50px;">
                                            @endif
                                        </td>
                                        <td class="center">
                                            <div class="fr">
                                                <a href="{{ url('/admin/edit-review/'.$review->id) }}" class="btn btn-primary btn-mini">Edit</a>
                                                <a data-id="{{$review->id}}" href="#" class="btn btn-danger btn-mini delReview">Delete</a>
                                            </div>
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