
@extends('admin.layouts.master')

@section('content')
    <div class="col-sm-12">
        <!-- Nestable card start -->
        <div class="card">
            <div class="card-header">
                <h5>{{ trans('quickadmin::templates.templates-view_edit-edit') }}</h5>
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

                {!! Form::model($slider1, array('files' => true, 'class' => 'form-horizontal', 'id' => 'form-with-validation', 'method' => 'PATCH', 'route' => array(config('quickadmin.route').'.slider1.update', $slider1->id))) !!}

                <div class="form-group">
                    {!! Form::label('title', 'Title*', array('class'=>'col-sm-2 control-label')) !!}
                    <div class="col-sm-10">
                        {!! Form::text('title', old('title',$slider1->title), array('class'=>'form-control')) !!}

                    </div>
                </div><div class="form-group">
                    {!! Form::label('image', 'image', array('class'=>'col-sm-2 control-label')) !!}
                    <div class="col-sm-10">
                        {!! Form::file('image') !!}
                        {!! Form::hidden('image_w', 4096) !!}
                        {!! Form::hidden('image_h', 4096) !!}

                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-10 col-sm-offset-2">
                        {!! Form::submit(trans('quickadmin::templates.templates-view_edit-update'), array('class' => 'btn btn-primary')) !!}
                        {!! link_to_route(config('quickadmin.route').'.slider1.index', trans('quickadmin::templates.templates-view_edit-cancel'), null, array('class' => 'btn btn-default')) !!}
                    </div>
                </div>

                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
