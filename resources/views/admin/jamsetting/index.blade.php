

@extends('admin.layouts.master')
@section('css')
    <!-- Data Table Css -->
    <link rel="stylesheet" type="text/css" href="ablepro/bower_components/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="ablepro/assets/pages/data-table/css/buttons.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="ablepro/bower_components/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css">
    <!-- Style.css -->

@endsection
@section('content')
    <div class="col-sm-12">
        <!-- Nestable card start -->
        <div class="card">
            <div class="card-header">
                <h5>{{ trans('quickadmin::templates.templates-view_index-list') }}</h5>
            </div>
            <div class="card-block">



                @if ($jamsetting->count())


                    <div class="table-responsive dt-responsive">

                        <table class="table table-striped table-bordered nowrap datatable" id="datatable">
                            <thead>
                            <tr>
                                <th>Nama Setting</th>
                                <th>Value</th>
                            </tr>


                            </thead>

                            <tbody>
                            @foreach ($jamsetting as $row)
                                <tr>
                                    <th>Nama Masjid</th>
                                    <td>{{ $row->namemosque }}</td>
                                </tr>
                                <tr>
                                    <th>alamat</th>
                                    <td>{{ $row->alamat }}</td>
                                </tr>
                                <tr>
                                    <th>longitude</th>
                                    <td>{{ $row->logitude }}</td>
                                </tr>
                                <tr>
                                    <th>latitude</th>
                                    <td>{{ $row->latitude }}</td>
                                </tr>
                                <tr>
                                    <th>waktuadzan</th>
                                    <td>{{ $row->waktuadzan }}</td>
                                </tr>
                                <tr>
                                    <th>menuju iqomah</th>
                                    <td>{{ $row->countdown }}</td>
                                </tr>
                                <tr>
                                    <th>lama dzikir</th>
                                    <td>{{ $row->dzikir_time }}</td>
                                </tr>
                                <tr>
                                    <th>waktu slider 1</th>
                                    <td>{{ $row->slider1 }}</td>
                                </tr>
                                <tr>
                                    <th>waktu slider 2</th>
                                    <td>{{ $row->slider2 }}</td>
                                </tr>
                                <tr>
                                    <th>waktu slider 3</th>
                                    <td>{{ $row->slider3 }}</td>
                                </tr>
                                <tr>
                                    <td>
                                        {!! link_to_route(config('quickadmin.route').'.jamsetting.edit', trans('quickadmin::templates.templates-view_index-edit'), array($row->id), array('class' => 'btn btn-xs btn-info')) !!}

                                    </td>
                                </tr>

                            @endforeach
                            </tbody>
                        </table>

                    </div>
            </div>
            @else
                {{ trans('quickadmin::templates.templates-view_index-no_entries_found') }}
            @endif
        </div>

    </div>
    </div>
    </div>

@endsection
