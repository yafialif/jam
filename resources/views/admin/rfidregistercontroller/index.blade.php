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

                @if ($jamaah->count())
                    <div id="table_data">
                        <div class="table-responsive dt-responsive">
                            <table class="table table-striped table-bordered nowrap datatable" id="datacetak">
                                <thead>
                                <tr>
                                    <th>
                                        {!! Form::checkbox('delete_all',1,false,['class' => 'mass']) !!}
                                    </th>
                                    <th>Nama</th>
                                    <th>Tlpn</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Kategori</th>
                                    <th>RFID</th>
                                    <th>Status</th>
                                </tr>
                                </thead>
                                <tbody class="ustad">
                                @foreach ($jamaah as $row)
                                    <tr >
                                        <td>
                                            {!! Form::checkbox('del-'.$row->id,1,false,['class' => 'single','data-id'=> $row->id]) !!}
                                        </td>
                                        <td>{{ $row->name }}</td>
                                        <td>{{ $row->tlpn }}</td>
                                        <td>{{ $row->jenis_kelamin }}</td>
                                        <td>{{ $row->kategori }}</td>
                                        <td>
                                            <input id="rfid{{ $row->id  }}" class="rfid form-control">
                                        </td>
                                        <td><input type="button" href="#detail{{ $row->id }}" class="btn btn-mini btn-secondary" onclick="modal({{ $row->id }})" value="Detail"><input type="button" href="#" class="btn btn-mini btn-info" onclick="edit({{ $row->id }})" value="Save"></td>
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

            @else
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

    <script src="{{ URL::asset('/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('/js/buttons.html5.min.js') }}"></script>
    <script src="{{ URL::asset('/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ URL::asset('/js/jszip.min.js') }}"></script>
    <script src="{{ URL::asset('/js/pdfmake.min.js') }}"></script>
    <script src="{{ URL::asset('/js/vfs_fonts.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('#datacetak').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'copyHtml5',
                    'excelHtml5',
                    'csvHtml5',
                    'pdfHtml5'
                ]
            });
        });

        function modal(id) {

            var settings = {
                "async": true,
                "crossDomain": true,
                "url": url+"/api/detail",
                "method": "POST",
                "headers": {
                    "Content-Type": "application/x-www-form-urlencoded",
                    "cache-control": "no-cache",
                    "Postman-Token": "9c1dfe9f-3a2c-4d4a-be0c-b2709657b46b"
                },
                "data": {
                    "id": id
                }
            }

            $.ajax(settings).done(function (response) {
                console.log(response.result[0]);
                text =
                    "<tr><td>Nama</td>\n" +
                    "<td>"+response.result[0].nama+"</td></tr>\n"+
                    "<tr><td>Tlpn</td>\n" +
                    "<td>"+response.result[0].tlpn+"</td></tr>\n"+
                    "<tr><td>Jumlah Buku</td>\n" +
                    "<td>"+response.result[0].jumlah_buku+"</td></tr>\n"+
                    "<tr><td>Alamat Lengkap</td>\n" +
                    "<td calass=\"text-nowrap\">"+response.result[0].alamat_lengkap+"</td></tr>\n"+
                    "<tr><td>Harga Ongkir</td>\n" +
                    "<td>"+response.result[0].harga_ongkir+"</td></tr>\n"+
                    "<tr><td>kecamatan</td>\n" +
                    "<td>"+response.result[0].kecamatan+"</td></tr>\n"+
                    "<tr><td>kota</td>\n" +
                    "<td>"+response.result[0].kota+"</td></tr>\n"+
                    "<tr><td>kurir</td>\n" +
                    "<td>"+response.result[0].kurir+"</td></tr>\n"+
                    "<tr><td>provinsi</td>\n" +
                    "<td>"+response.result[0].provinsi+"</td></tr>\n"+
                    "<tr><td>total harga</td>\n" +
                    "<td>"+response.result[0].total_harga+"</td></tr>\n"+
                    "<tr><td>Tgl Order</td>\n" +
                    "<td>"+response.result[0].created_at+"</td></tr>\n"+
                    "<tr><td>Tgl Proses</td>\n" +
                    "<td>"+response.result[0].updated_at+"</td></tr>\n"+
                    "<tr><td>Resi</td>\n" +
                    "<td>"+response.result[0].resi+"</td></tr>\n"+
                    "<tr><td>Bukti TF</td>\n" +
                    "<td><image src=\""+response.result[0].resi+"\" width=\"300px\"></td></tr>\n";
                document.getElementById("content").innerHTML = text;
                $('#mymodal').modal('show');
            });
        }
        function edit(id) {
            var uid = $("#rfid"+id).val();
            var uri = "{{ url('/') }}";
            var settings = {
                "async": true,
                "crossDomain": true,
                "method": "GET",

                "headers": {
                    "cache-control": "no-cache",
                    "Postman-Token": "30d21590-8c00-4a63-b09a-daffa2bddac6",
                    "Access-Control-Allow-Origin": "*",
                    'Access-Control-Allow-Headers': 'Origin, Content-Type, Accept, Authorization, X-Request-With',
                },

            }
            url = uri + "/updaterfid/"+id+"/"+ uid;
            $.getJSON(url, settings, function (response) {
                // console.log(response);
                if(response === true){
                    $("#rfid"+id).css("background-color", "white");
                    $("#rfid"+id).prop("disabled", true);

                }
                else{
                    $("#rfid"+id).css("background-color", "pink");
                }
            });

        }


    </script>

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
