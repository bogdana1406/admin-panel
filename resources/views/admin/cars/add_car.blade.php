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

                                    <div class="control-group">
                                        <label class="control-label">Select</label>
                                        <div class="controls">
                                            <div class="select2-container" id="s2id_autogen1">

                                                <option>First option</option>
                                                <option>Second option</option>
                                                <option>Third option</option>
                                                <option>Fourth option</option>
                                                <option>Fifth option</option>
                                                <option>Sixth option</option>
                                                <option>Seventh option</option>
                                                <option>Eighth option</option>
                                            </select>
                                        </div>
                                    </div>

                                    <label class="control-label">Model</label>
                                    <div class="controls">
                                        <input type="text" name="model" id="model">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Model</label>
                                    <div class="controls">
                                        <input type="text" name="model" id="model">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Description</label>
                                    <div class="controls">
                                        <textarea type="text" name="description" id="description"></textarea>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">URL</label>
                                    <div class="controls">
                                        <input type="text" name="url" id="url">
                                    </div>
                                </div>
                                <div class="form-actions">
                                    <input type="submit" value="Add Category" class="btn btn-success">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection