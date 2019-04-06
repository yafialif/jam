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

{!! Form::open(array('files' => true, 'route' => config('quickadmin.route').'.event.store', 'id' => 'form-with-validation', 'class' => 'form-horizontal')) !!}

<div class="form-group">
    {!! Form::label('category_id', 'Category Event', array('class'=>'control-label')) !!}
    <div class="col-md-12">
        {!! Form::select('category_id', $category, old('category_id'), array('class'=>'form-control form-control-primary')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('nama', 'Nama Event*', array('class'=>'control-label')) !!}
    <div class="col-md-12">
        {!! Form::text('nama', old('nama'), array('class'=>'form-control form-control-primary')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('image', 'Image*', array('class'=>'control-label')) !!}
    <div class="col-md-12">
        {!! Form::file('image') !!}
        {!! Form::hidden('image_w', 4096) !!}
        {!! Form::hidden('image_h', 4096) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('deskripsi', 'Deskripsi', array('class'=>'control-label')) !!}
    <div class="col-md-12">
        {!! Form::textarea('deskripsi', old('deskripsi'), array('class'=>'form-control my-editor')) !!}
        
    </div>
</div>

<div class="form-group">
    <div class="col-md-12 col-sm-offset-2">
      {!! Form::submit( trans('quickadmin::templates.templates-view_create-create') , array('class' => 'btn btn-sm btn-primary')) !!}
    </div>
</div>

{!! Form::close() !!}
</div>
</div>
</div>
@endsection

@section('javascript')

    @endsection