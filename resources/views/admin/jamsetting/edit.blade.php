@extends('admin.layouts.master')

@section('content')

<div class="row">
    <div class="col-sm-10 col-sm-offset-2">
        <h1>{{ trans('quickadmin::templates.templates-view_edit-edit') }}</h1>

        @if ($errors->any())
        	<div class="alert alert-danger">
        	    <ul>
                    {!! implode('', $errors->all('<li class="error">:message</li>')) !!}
                </ul>
        	</div>
        @endif
    </div>
</div>

{!! Form::model($jamsetting, array('class' => 'form-horizontal', 'id' => 'form-with-validation', 'method' => 'PATCH', 'route' => array(config('quickadmin.route').'.jamsetting.update', $jamsetting->id))) !!}

<div class="form-group">
    {!! Form::label('namemosque', 'Nama Masjid*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('namemosque', old('namemosque',$jamsetting->namemosque), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('alamat', 'alamat*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('alamat', old('alamat',$jamsetting->alamat), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('logitude', 'longitude*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('logitude', old('logitude',$jamsetting->logitude), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('latitude', 'latitude*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('latitude', old('latitude',$jamsetting->latitude), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('waktuadzan', 'waktuadzan*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('waktuadzan', old('waktuadzan',$jamsetting->waktuadzan), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('countdown', 'menuju iqomah*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('countdown', old('countdown',$jamsetting->countdown), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('dzikir_time', 'lama dzikir*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('dzikir_time', old('dzikir_time',$jamsetting->dzikir_time), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('slider1', 'waktu slider 1*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('slider1', old('slider1',$jamsetting->slider1), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('slider2', 'waktu slider 2*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('slider2', old('slider2',$jamsetting->slider2), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('slider3', 'waktu slider 3*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('slider3', old('slider3',$jamsetting->slider3), array('class'=>'form-control')) !!}
        
    </div>
</div>

<div class="form-group">
    <div class="col-sm-10 col-sm-offset-2">
      {!! Form::submit(trans('quickadmin::templates.templates-view_edit-update'), array('class' => 'btn btn-primary')) !!}
      {!! link_to_route(config('quickadmin.route').'.jamsetting.index', trans('quickadmin::templates.templates-view_edit-cancel'), null, array('class' => 'btn btn-default')) !!}
    </div>
</div>

{!! Form::close() !!}

@endsection