@extends('layouts.app')

@section('head')
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jscolor/2.4.6/jscolor.min.css">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jscolor/2.4.6/jscolor.min.js"></script>
@endsection
@section('content')
    <section class="content col-md-12">
        <div class="box box-default">
            <div class="box-header with-border text-center">
                <h3 class="box-title">Edit Location</h3>
            </div>
            <form class="form-horizontal" role="form" method="post">
                @csrf  
                <div class="box-body">
                    <div class="form-group">
                        <label for="name" class="col-sm-4 control-label">Location Name</label>

                        <div class="col-sm-4">
                            <input type="text" id="name" class="form-control" value="{{ $location->name }}" name="name" autocomplete="off" autofocus required oninvalid="this.setCustomValidity('@lang('please_fillout_thisfield')')" oninput="setCustomValidity('')"/>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-4 control-label no-padding-right" for="latitude">Latitude</label>

                        <div class="col-sm-4">
                            <input type="text" id="latitude" class="form-control" value="{{ $location->latitude }}" name="latitude" autocomplete="off" required oninvalid="this.setCustomValidity('@lang('please_fillout_thisfield')')" oninput="setCustomValidity('')"/>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-sm-4 control-label no-padding-right" for="longitude">Longitude</label>

                        <div class="col-sm-4">
                            <input type="text" id="longitude" class="form-control" value="{{ $location->longitude }}" name="longitude" autocomplete="off" required oninvalid="this.setCustomValidity('@lang('please_fillout_thisfield')')" oninput="setCustomValidity('')"/>
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-sm-4 control-label no-padding-right" for="latitude">Color Picker</label>

                        <div class="col-sm-4">
                            <input class="form-control jscolor" type="text" id="color" name="color" value="{{ $location->color }}">
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

                {{-- Google Maps Codes Start --}}
                <div class="box-header with-border text-center">
                    <h3 class="box-title">Location On Map</h3>
                </div>
                <div id="map" style="height: 400px;"></div>

                <script type="text/javascript">
                    function initMap() {
                    const myLatLng = {lat: {{ $location->latitude }}, lng: {{ $location->longitude }}};
                    const map = new google.maps.Map(document.getElementById("map"), {
                        zoom: 5,
                        center: myLatLng,
                    });

                    new google.maps.Marker({
                        position: myLatLng,
                        map,
                        title: "Location",
                    });
                    }

                    window.initMap = initMap;
                </script>

                <script type="text/javascript"
                    src="https://maps.google.com/maps/api/js?key={{ $api_key }}&callback=initMap" >
                </script>
                {{-- Google Maps Codes End --}}

            {{-- @include('layouts.errors') --}}
            <!-- /.box-footer -->
            </form>
        </div>
    </section>
@endsection

@section('jscontent')

@endsection
