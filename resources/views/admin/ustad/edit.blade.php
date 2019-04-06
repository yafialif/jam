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

{!! Form::model($ustad, array('class' => 'form-horizontal', 'id' => 'form-with-validation', 'method' => 'PATCH', 'route' => array(config('quickadmin.route').'.ustad.update', $ustad->id))) !!}

<div class="form-group">
    {!! Form::label('id_ustad', 'ID Ustad*', array('class'=>'control-label')) !!}
    <div class="col-md-12">
        {!! Form::text('id_ustad', old('id_ustad',$ustad->id_ustad), array('class'=>'form-control form-control-primary')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('nama_ustad', 'Nama Ustad*', array('class'=>'control-label')) !!}
    <div class="col-md-12">
        {!! Form::text('nama_ustad', old('nama_ustad',$ustad->nama_ustad), array('class'=>'form-control form-control-primary')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('category_id', 'Nama Category', array('class'=>'control-label')) !!}
    <div class="col-md-12">
        {!! Form::select('category_id', $category, old('category_id',$ustad->category_id), array('class'=>'form-control form-control-primary')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('password_ustad', 'Password', array('class'=>'control-label')) !!}
    <div class="col-md-12">
        {!! Form::password('password_ustad', array('class'=>'form-control form-control-primary')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('deskripsi', 'Deskripsi_ustad', array('class'=>'control-label')) !!}
    <div class="col-md-12">
        {!! Form::textarea('deskripsi', old('deskripsi',$ustad->deskripsi), array('class'=>'form-control ckeditor')) !!}
        
    </div>
</div>

<div class="form-group">
    <div class="col-md-12 col-sm-offset-2">
      {!! Form::submit(trans('quickadmin::templates.templates-view_edit-update'), array('class' => 'btn btn-primary')) !!}
      {!! link_to_route(config('quickadmin.route').'.ustad.index', trans('quickadmin::templates.templates-view_edit-cancel'), null, array('class' => 'btn btn-sm btn-default')) !!}
    </div>
</div>

{!! Form::close() !!}
</div>
</div>
</div>
@endsection