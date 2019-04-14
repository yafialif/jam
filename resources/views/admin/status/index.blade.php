@extends('admin.layouts.master')
@section('css')
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('ablepro/assets/pages/notification/notification.css') }}">
@endsection
@section('content')
    <div class="col-sm-12" >
        <!-- Nestable card start -->
        <div class="card">
            <div class="card-header">
                <h5>{{ trans('quickadmin::templates.templates-view_index-list') }}</h5>
            </div>
            <div class="card-block">

                @if ($status->count())
                    <div id="table_data">
                        <div class="table-responsive dt-responsive">
                            <table class="table table-striped table-bordered nowrap datatable" id="datacetak">
                                <thead>
                                <tr>
                                    <th>
                                        {!! Form::checkbox('delete_all',1,false,['class' => 'mass']) !!}
                                    </th>
                                    <th>Date</th>
                                    <th>Sahur</th>
                                    <th>Buka</th>
                                    <th>Itikaf</th>
                                </tr>
                                </thead>
                                <tbody class="ustad">
                                @foreach ($status as $row)
                                    <tr >
                                        <td>
                                            {!! Form::checkbox('del-'.$row->id,1,false,['class' => 'single','data-id'=> $row->id]) !!}
                                        </td>
                                        <td>{{ $row->date }}</td>
                                        <td>{{ $row->saur }}</td>
                                        <td>{{ $row->buka }}</td>
                                        <td>{{ $row->itikaf }}</td>
                                       </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="notifications">
                        </div>

                        <nav aria-label="Page navigation example">
                            {{--{{ $store->links('vendor.pagination.bootstrap-4') }}--}}
                            <div id="loading"></div>
                        </nav>
                    </div>


            </div>

                {{ trans('quickadmin::templates.templates-view_index-no_entries_found') }}
            @endif
        </div>
        <div id="mymodal" class="modal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p >
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Keterangan</th>
                                    <th>Hasil</th>
                                </tr>
                                </thead>
                                <tbody id="content">

                                </tbody>
                            </table>
                        </div>
                        </p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary">Save changes</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    <div class="row">

    </div>

@endsection

@section('javascript')
    {{--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>--}}
    {{--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>--}}
    <script src="{{ URL::asset('ablepro/assets/js/bootstrap-growl.min.js') }}"></script>
    {{--<script src="{{ URL::asset('ablepro/assets/pages/notification/notification.js') }}"></script>--}}
    <script src="{{ URL::asset('ablepro/assets/js/pcoded.min.js') }}"></script>
    <script src="{{ URL::asset('ablepro/assets/js/vertical/vertical-layout.min.js') }}"></script>
    <script src="{{ URL::asset('ablepro/assets/js/jquery.mCustomScrollbar.concat.min.js') }}"></script>


@stop
