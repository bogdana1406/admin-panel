@extends('layouts.adminLayout.admin_design')
@section('content')
    <div id="content">
        <div id="content-header">
            <div id="breadcrumb"> <a href="#" class="current">Settings</a> </div>
            <h1>Admin Settings</h1>
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
                <div class="row-fluid">
                    <div class="span12">
                        <div class="widget-box">
                            <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
                                <h5>Update Password</h5>
                            </div>
                            <div class="widget-content nopadding">
                                <form class="form-horizontal" method="post" action="{{ url('/admin/update-pwd') }}" name="password_validate" id="password_validate" novalidate="novalidate">{{ csrf_field() }}
                                    <div class="control-group">
                                        <label class="control-label">Current Password</label>
                                        <div class="controls">
                                            <input type="password" name="current_pwd" id="current_pwd" />
                                            <snap id="chkPwd"></snap>
                                        </div>
                                    <div class="control-group">
                                        <label class="control-label">New Password</label>
                                        <div class="controls">
                                            <input type="password" name="new_pwd" id="new_pwd" />
                                            @if($errors->has('new_pwd'))

                                                <span class="alert alert-danger" role="alert">
                                              {{$errors->first('new_pwd')}}
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">Confirm Password</label>
                                        <div class="controls">
                                            <input type="password" name="confirm_pwd" id="confirm_pwd" />
                                            @if($errors->has('confirm_pwd'))
                                                <span class="alert alert-danger" role="alert">
                                              {{$errors->first('confirm_pwd')}}
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-actions">
                                        <input type="submit" value="Update Password" class="btn btn-success">
                                    </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

