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
                <div id="nestable-menu" class="m-b-10">
                    {!! link_to_route(config('quickadmin.route').'.jamaah.create', trans('quickadmin::templates.templates-view_index-add_new') , null, array('class' => 'btn btn-success btn-mini')) !!}
                </div>

                <div class="row">
                    <div class="sub-title">
                        {{ Form::open(array('action' => 'Admin\JamaahController@search', 'method' => 'post')) }}
                        <input type="text" name="search" id="search" placeholder="email"> <button class="btn btn-mini btn-info" type="submit"><i class="fa fa-search"></i></i>Submit</button>
                        {{ Form::close() }}
                    </div>
                </div>
                @if ($jamaah->count())

                    @include('admin.jamaah.load')

            </div>
            @else
                {{ trans('quickadmin::templates.templates-view_index-no_entries_found') }}
            @endif
        </div>

    </div>
    </div>
    </div>
@endsection
@section('javascript')
    <script>
        $(document).ready(function () {
            $('#delete').click(function () {
                if (window.confirm('{{ trans('quickadmin::templates.templates-view_index-are_you_sure') }}')) {
                    var send = $('#send');
                    var mass = $('.mass').is(":checked");
                    if (mass == true) {
                        send.val('mass');
                    } else {
                        var toDelete = [];
                        $('.single').each(function () {
                            if ($(this).is(":checked")) {
                                toDelete.push($(this).data('id'));
                            }
                        });
                        send.val(JSON.stringify(toDelete));
                    }
                    $('#massDelete').submit();
                }
            });
        });
    </script>
@stop
