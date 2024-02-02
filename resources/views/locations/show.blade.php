@extends('layouts.app')

@section('head')
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jscolor/2.4.6/jscolor.min.css">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jscolor/2.4.6/jscolor.min.js"></script>

    <style>
        .text-center {
            text-align: center;
        }
        #map {
            width: "100%";
            height: 400px;
        }
    </style>
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

                <script src="https://maps.googleapis.com/maps/api/js?key={{$api_key}}&callback=initMap" async></script>
                <script>
                    let map, activeInfoWindow, markers = [];

                    /* ----------------------------- Initialize Map ----------------------------- */
                    function initMap() {
                        map = new google.maps.Map(document.getElementById("map"), {
                            center: {
                                lat: {{$location->latitude}},
                                lng: {{$location->longitude}},
                            },
                            zoom: 15
                        });

                        map.addListener("click", function(event) {
                            mapClicked(event);
                        });

                        initMarkers();
                    }

                    /* --------------------------- Initialize Markers --------------------------- */
                    function initMarkers() {
                        const initialMarkers ={!! json_encode($initialMarkers) !!};

                        for (let index = 0; index < initialMarkers.length; index++) {

                            const markerData = initialMarkers[index];
                            const marker = new google.maps.Marker({
                                position: markerData.position,
                                label: markerData.label,
                                draggable: markerData.draggable,
                                map
                            });
                            markers.push(marker);

                            const infowindow = new google.maps.InfoWindow({
                                content: `<b>${markerData.position.lat}, ${markerData.position.lng}</b>`,
                            });
                            marker.addListener("click", (event) => {
                                if(activeInfoWindow) {
                                    activeInfoWindow.close();
                                }
                                infowindow.open({
                                    anchor: marker,
                                    shouldFocus: false,
                                    map
                                });
                                activeInfoWindow = infowindow;
                                markerClicked(marker, index);
                            });

                            marker.addListener("dragend", (event) => {
                                markerDragEnd(event, index);
                            });
                        }
                    }

                    /* ------------------------- Handle Map Click Event ------------------------- */
                    function mapClicked(event) {
                        console.log(map);
                        console.log(event.latLng.lat(), event.latLng.lng());
                    }

                    /* ------------------------ Handle Marker Click Event ----------------------- */
                    function markerClicked(marker, index) {
                        console.log(map);
                        console.log(marker.position.lat());
                        console.log(marker.position.lng());
                    }

                    /* ----------------------- Handle Marker DragEnd Event ---------------------- */
                    function markerDragEnd(event, index) {
                        console.log(map);
                        console.log(event.latLng.lat());
                        console.log(event.latLng.lng());
                    }

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
