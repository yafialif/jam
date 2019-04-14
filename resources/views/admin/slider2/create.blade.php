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
                {!! Form::open(array('files' => true, 'route' => config('quickadmin.route').'.slider2.store', 'id' => 'form-with-validation', 'class' => 'form-horizontal')) !!}

                <div class="form-group">
                    {!! Form::label('title', 'Name', array('class'=>'col-sm-2 control-label')) !!}
                    <div class="col-sm-10">
                        {!! Form::text('title', old('title'), array('class'=>'form-control')) !!}

                    </div>
                </div><div class="form-group">
                    {!! Form::label('category', 'category', array('class'=>'col-sm-2 control-label')) !!}
                    <div class="col-sm-10">
                        <select id="category" class="form-control" name="category">
                            <option value="text">Text</option>
                            <option value="video">Video</option>
                            <option value="image">Image</option>
                        </select>
                    </div>
                </div><div class="form-group file">
                    {!! Form::label('file', 'file', array('class'=>'col-sm-2 control-label')) !!}
                    <div class="col-sm-10">
                        {!! Form::file('file') !!}

                    </div>
                </div>
                <div class="form-group text">
                    {!! Form::label('arab', 'arab', array('class'=>'col-sm-2 control-label')) !!}
                    <div class="col-sm-10">
                        {!! Form::text('arab', old('arab'), array('class'=>'form-control')) !!}

                    </div>
                </div>
                <div class="form-group text">
                    {!! Form::label('terjemah', 'terjemah', array('class'=>'col-sm-2 control-label')) !!}
                    <div class="col-sm-10">
                        {!! Form::text('terjemah', old('terjemah'), array('class'=>'form-control')) !!}

                    </div>
                </div><div class="form-group text">
                    {!! Form::label('riwayat', 'riwayat', array('class'=>'col-sm-2 control-label')) !!}
                    <div class="col-sm-10">
                        {!! Form::text('riwayat', old('riwayat'), array('class'=>'form-control')) !!}

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
@section('js')
    <script>
        $(document).ready(function() {
            $('.file').hide();
            $('#category').on('change', function () {
                var category = $("#category").val();
                if (category === 'text') {
                    $('.text').show();
                    $('.file').hide();
                }
                else{
                    $('.text').hide();
                    $('.file').show();
                }
            });
        });
    </script>
    @endsection
