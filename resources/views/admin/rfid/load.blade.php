<div class="table-responsive dt-responsive">
    <table class="table table-striped table-bordered nowrap datatable" id="datatable">
        <thead>
        <tr>
            <th>
                {!! Form::checkbox('delete_all',1,false,['class' => 'mass']) !!}
            </th>
            <th>Nama</th>
            <th>tlpn</th>
            <th>Jenis Kelamin</th>
            <th>Foto</th>
            <th>&nbsp;</th>
        </tr>
        </thead>

        <tbody>
        @foreach ($jamaah as $row)
            <tr>
                <td>
                    {!! Form::checkbox('del-'.$row->id,1,false,['class' => 'single','data-id'=> $row->id]) !!}
                </td>
                <td>{{ $row->name }}</td>
                <td>{{ $row->tlpn }}</td>
                <td>{{ $row->jenis_kelamin }}</td>
                <td>@if($row->image != '')<img width="100px" src="{{  $row->image }}">@endif</td>
                <td>
                    {!! link_to_route(config('quickadmin.route').'.jamaah.edit', trans('quickadmin::templates.templates-view_index-edit'), array($row->id), array('class' => 'btn btn-xs btn-info btn-mini')) !!}
                    {!! Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'onsubmit' => "return confirm('".trans("quickadmin::templates.templates-view_index-are_you_sure")."');",  'route' => array(config('quickadmin.route').'.jamaah.destroy', $row->id))) !!}
                    {!! Form::submit(trans('quickadmin::templates.templates-view_index-delete'), array('class' => 'btn btn-xs btn-danger btn-mini')) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="row">
        <div class="col-xs-12">
            <button class="btn btn-sm btn-danger" id="delete">
                {{ trans('quickadmin::templates.templates-view_index-delete_checked') }}
            </button>
        </div>
    </div>
    {!! Form::open(['route' => config('quickadmin.route').'.usermanual.massDelete', 'method' => 'post', 'id' => 'massDelete']) !!}
    <input type="hidden" id="send" name="toDelete">
    {!! Form::close() !!}
</div>

<nav aria-label="Page navigation example">
{{--{{ $jamaah->links('vendor.pagination.bootstrap-4') }}--}}
    <div id="loading"></div>
</nav>
