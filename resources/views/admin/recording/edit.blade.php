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

{!! Form::model($recording, array('files' => true, 'class' => 'form-horizontal', 'id' => 'form-with-validation', 'method' => 'PATCH', 'route' => array(config('quickadmin.route').'.recording.update', $recording->id))) !!}

<div class="form-group">
    {!! Form::label('ustad_id', 'Ustad', array('class'=>'control-label')) !!}
    <div class="col-md-12">
        {!! Form::select('ustad_id', $ustad, old('ustad_id',$recording->ustad_id), array('class'=>'form-control form-control-primary')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('id_recording', 'Id Recording', array('class'=>'control-label')) !!}
    <div class="col-md-12">
        {!! Form::text('id_recording', old('id_recording',$recording->id_recording), array('class'=>'form-control form-control-primary')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('record', 'Record', array('class'=>'control-label')) !!}
    <div class="col-md-12">
        {!! Form::file('record') !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('note', 'note', array('class'=>'control-label')) !!}
    <div class="col-md-12">
        {!! Form::text('note', old('note',$recording->note), array('class'=>'form-control form-control-primary')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('status', 'status', array('class'=>'control-label')) !!}
    <div class="col-md-12">
        {!! Form::hidden('status','') !!}
        {!! Form::checkbox('status', 1, $recording->status == 1) !!}
        
    </div>
</div>

<div class="form-group">
    <div class="col-md-12 col-sm-offset-2">
      {!! Form::submit(trans('quickadmin::templates.templates-view_edit-update'), array('class' => 'btn btn-primary')) !!}
      {!! link_to_route(config('quickadmin.route').'.recording.index', trans('quickadmin::templates.templates-view_edit-cancel'), null, array('class' => 'btn btn-sm btn-default')) !!}
    </div>
</div>

{!! Form::close() !!}
</div>
</div>
</div>
@endsection