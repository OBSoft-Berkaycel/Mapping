@extends('layouts.app')

@section('head')
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jscolor/2.4.6/jscolor.min.css">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jscolor/2.4.6/jscolor.min.js"></script>
@endsection
@section('content')
    <section class="content col-md-12">
        <div class="box box-default">
            <div class="box-header with-border text-center">
                <h3 class="box-title">Add New Api Key</h3>

            </div>
            <form class="form-horizontal" role="form" method="post">
                @csrf  
                <div class="box-body">
                    <div class="form-group">
                        <label for="name" class="col-sm-4 control-label">Name</label>

                        <div class="col-sm-4">
                            <input type="text" id="name" class="form-control" name="name" autocomplete="off" autofocus required oninvalid="this.setCustomValidity('@lang('please_fillout_thisfield')')" oninput="setCustomValidity('')"/>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-4 control-label no-padding-right" for="api_key">Api Key</label>

                        <div class="col-sm-4">
                            <input type="text" id="api_key" class="form-control" name="api_key" autocomplete="off" required oninvalid="this.setCustomValidity('@lang('please_fillout_thisfield')')" oninput="setCustomValidity('')"/>
                        </div>
                    </div>
                    
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <div class="col-md-offset-5 ">
                        <button type="submit" class="btn btn-primary" style="font-weight: 600;">
                            <i class="ace-icon fa fa-check bigger-110"></i>
                            @lang('submit')
                        </button>
                    </div>
                </div>
            {{-- @include('layouts.errors') --}}
            <!-- /.box-footer -->
            </form>
        </div>
    </section>
@endsection

@section('jscontent')

@endsection