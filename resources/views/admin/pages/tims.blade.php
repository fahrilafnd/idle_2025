@extends('admin.layouts.base')

{{--Page Title--}}

@section('title', 'Tim')

{{--Custom CSS--}}

@section('css')
    {{--<link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">--}}
@endsection

{{--App Title--}}

@section('app-title', 'Daftar tim')
@section('app-description', 'Daftar tim yang mengikuti IDLe')

{{--Content--}}

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="form-group">
                    <a href="{{ route('admin.export.tims') }}"
                       class="btn btn-success"><span class="fa fa-file-excel-o"></span>Cetak XLS</a>
                </div>
                <div class="tile-body">
                    <table class="table table-hover table-bordered" id="tim-table">
                        <thead>
                        <tr>
                            <th width="5%">No</th>
                            <th width="15%">Nama Tim</th>
                            <th width="">Ketua Tim</th>
                            <th width="5%">Babak</th>
                            <th width="10%">Kategori</th>
                            <th width="10%">Action</th>
                        </tr>
                        </thead>

                        <tbody>

                        </tbody>
                    </table>
                    <form action="{{ route('admin.tim.destroy', ['tim' => -1]) }}" method="post" id="delete-form">
                        @csrf
                        @method('POST')
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

{{--Custom Javascript--}}

@section('js')
    {{--<script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>--}}
    <script>
        function deletePost(id) {
            var c = confirm("Are you sure delete this tim?");
            if (c == true) {
                url = $('#delete-form').attr('action');
                url = url.substring(0, url.length - 2) + id;
                url = $('#delete-form').attr('action', url);
                // return;
                $('#delete-form').submit();
            } else {

            }
        }
    </script>

    <script>
        $(document).ready(function () {
            $('#tim-table').DataTable({
                processing: false,
                serverSide: true,
                responsive: true,
                ajax: "{{ route('admin.ajax.tim') }}",
                columns: [
                    {data: 'no'},
                    {data: 'nama_tim'},
                    {data: 'mahasiswa.nama'},
                    {data: 'babak'},
                    {data: 'kategori.nama_kategori'},
                    {
                        data: 'id',
                        render: function (data, type, row) {
                          content = "<a href=\"/admin/tim/" + data +"/edit/\" class=\"btn btn-sm btn-info fa fa-pencil\" title='Edit tim' data-toggle='tooltip'></a>";
                          content += "<button onclick=\"deletePost(" + data + ")\" class=\"btn btn-sm btn-danger fa fa-trash\" title='Hapus' data-toggle='tooltip'></button> </center>";
                            return content;
                        }
                    }
                ]
            });
        });
    </script>


@endsection
