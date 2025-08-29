@extends('admin.layouts.base')

{{--Page Title--}}

@section('title', 'Mahasiswa')

{{--Custom CSS--}}

@section('css')
    {{--<link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">--}}
@endsection

{{--App Title--}}

@section('app-title', 'Daftar mahasiswa')
@section('app-description', 'Daftar mahasiswa yang mengikuti IDLe')

{{--Content--}}

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="form-group">
                    <a href="{{ route('admin.export.mahasiswas') }}"
                       class="btn btn-success"><span class="fa fa-file-excel-o"></span>Cetak XLS</a>
                </div>
                <div class="tile-body">
                    <table class="table table-hover table-bordered" id="tim-table">
                        <thead>
                        <tr>
                            <th width="5%">No</th>
                            <th width="13%">NIM</th>
                            <th width="">Nama</th>
                            <th width="">Email</th>
                            <th width="15%">No HP</th>
                            <th width="10%">Action</th>
                        </tr>
                        </thead>

                        <tbody>

                        </tbody>
                    </table>
                    {{--<form action="{{ route('admin.final.destroy', ['tim' => -1, 'kategori' => $kategori->kategori ]) }}" method="post" id="delete-form">--}}
                    {{--@csrf--}}
                    {{--</form>--}}
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
                ajax: "{{ route('admin.ajax.mahasiswa') }}",
                columns: [
                    {data: 'no'},
                    {
                        data: 'nim',
                        render: function (data, row, type) {
                            return "<a href='/admin/mahasiswa/" + data + "'" + ">" + data + "</a>";
                        }
                    },
                    {data: 'nama'},
                    {data: 'email'},
                    {data: 'no_hp'},
                    {
                        data: 'nim',
                        render: function (data, type, row) {
                            content = "<a href='/admin/mahasiswa/" + data + "/edit'" + "class='btn btn-info'>Edit</a>";
                            // content += "<button onclick=\"deletePost(" + data + ")\" class=\"btn btn-danger\">Delete</button>";
                            return content;
                        }
                    }
                ]
            });
        });
    </script>


@endsection
