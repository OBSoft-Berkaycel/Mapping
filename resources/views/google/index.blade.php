@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('adminlte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
<script src="{{ asset('adminlte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>

<script src="{{ asset('assets/log/jquery-1.12.4.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/log/jquery.dataTables.min.js') }}" type="text/javascript"></script>

<style>
    .th-contrast{
        background-color: #8080801f !important;
    }
</style>
@endsection

@section('content')

        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header with-border text-center">
                            <h3 class="box-title">Google APIs</h3>
                        </div>
                    </div>
                    <table id="dynamic-table" class="table  table-bordered table-hover">
                        <thead>
                        <tr>
                            <th class="center th-contrast">Name</th>
                            <th class="center th-contrast">Api Key</th>
                            <th class="center"></th>
                        </tr>
                        </thead>
                            @foreach ($apis as $api)
                            <tbody>
                                <tr>
                                    <td class="center">{{ $api->name }}</td>
                                    <td class="center">{{ $api->api_key }}</td>
                                    <td class="project-actions text-center">
                                        <a class="btn btn-default btn-sm" href="/google/maps/show/{{$api->id}}"  data-rel="tooltip" title="@lang('edit')">
                                            <i class="fa fa-pencil">
                                            </i>
                                
                                        </a>
                                        <a href="/google/maps/delete/{{$api->id}}" class="tooltip-error btn btn-danger btn-sm" data-rel="tooltip" title="@lang('delete')" onclick="return confirm('Are you sure to delete this record?');">
                                            <i class="fa fa-trash-o">
                                            </i>
                                
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                            @endforeach
                    </table>
                    

                </div>
                <!-- /.row -->
                <div class="col-md-12"></div>
                @if ($apis->count() == 0)
                    <div class="col-md-12">
                        <a href="/google/maps/create" class="btn btn-primary" style="float:none;vertical-align:top;font-weight: 600;font-size:14px">
                            <i class="ace-icon fa fa-plus bigger-110"></i>
                            Add New Api Key
                        </a>
                    </div>
                @endif
            </div>
        </section>


@endsection
@section('jscontent')
<!-- DataTables -->
<!-- page specific plugin scripts -->

<script type="text/javascript">
    jQuery(function($) {
        
        var myTable =
            $('#dynamic-table')
                .DataTable( {
                    bAutoWidth: false,
                    "aoColumns": [
                        { "bSortable": true },
                        { "bSortable": false },
                        { "bSortable": false },
                    ],
                    "aaSorting": [],
                    select: {
                        style: 'multi'
                    }
                } );
    })
</script>

@endsection
@php
    $jquery = false;
@endphp