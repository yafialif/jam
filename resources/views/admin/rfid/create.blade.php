
@extends('admin.layouts.master')

@section('content')
    <div class="col-sm-12">
        <!-- Nestable card start -->
        <div class="card">
            <div class="card-header">
                <h5>{{ trans('quickadmin::templates.templates-view_create-add_new') }}</h5>
            </div>
            <div class="card-block">
                <div class="row">
                    <div class="col-md-12 col-sm-offset-2">

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    {!! implode('', $errors->all('<li class="error">:message</li>')) !!}
                                </ul>
                            </div>
                        @endif
                    </div>
                </div>

                {!! Form::open(array('files' => true, 'route' => config('quickadmin.route').'.jamaah.store', 'id' => 'form-with-validation', 'class' => 'form-horizontal')) !!}

                <div class="form-group">
                    {!! Form::label('name', 'Nama*', array('class'=>'col-sm-2 control-label')) !!}
                    <div class="col-sm-10">
                        {!! Form::text('name', old('name'), array('class'=>'form-control')) !!}

                    </div>
                </div><div class="form-group">
                    {!! Form::label('tlpn', 'tlpn*', array('class'=>'col-sm-2 control-label')) !!}
                    <div class="col-sm-10">
                        {!! Form::text('tlpn', old('tlpn'), array('class'=>'form-control')) !!}

                    </div>
                </div><div class="form-group">
                    {!! Form::label('jenis_kelamin', 'Jenis Kelamin*', array('class'=>'col-sm-2 control-label')) !!}
                    <div class="col-sm-10">
                        {!! Form::text('jenis_kelamin', old('jenis_kelamin'), array('class'=>'form-control')) !!}

                    </div>
                </div><div class="form-group">
                    {!! Form::label('image', 'Foto', array('class'=>'col-sm-2 control-label')) !!}
                    <div class="col-sm-10">
                        {!! Form::file('image') !!}
                        {!! Form::hidden('image_w', 4096) !!}
                        {!! Form::hidden('image_h', 4096) !!}

                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-10 col-sm-offset-2">
                        {!! Form::submit( trans('quickadmin::templates.templates-view_create-create') , array('class' => 'btn btn-primary')) !!}
                    </div>
                </div>

                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
