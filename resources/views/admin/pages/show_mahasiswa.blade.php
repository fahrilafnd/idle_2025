@extends('admin.layouts.base')

{{--Page Title--}}

@section('title', 'Mahasiswa')

{{--Custom CSS--}}

@section('css')
    {{--<link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">--}}
@endsection

{{--App Title--}}

@section('app-title', 'Identitas Mahasiswa')
@section('app-description', '')

{{--Content--}}

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-title">
                    {{ $mahasiswa->nama }} - {{ $mahasiswa->nim }}
                    <p style="font-size: 15px; font-weight: normal">
                        {{ $mahasiswa->email }} <br>
                        {{ $mahasiswa->no_hp }}
                    </p>
                    <a class="btn btn-primary" href="{{ route('admin.mahasiswa.edit', ['mahasiswa' => $mahasiswa->nim]) }}"><i class="fa fa-edit"></i>Edit</a>
                </div>
                <div class="tile-body">
                    <table class="table table-hover table-bordered" id="tim-table">
                        <thead>
                        <tr>
                            <th width="5%">No</th>
                            <th>Nama TIM</th>
                            <th>Kategori</th>
                            {{--<th width="10%">Submission</th>--}}
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($mahasiswa->pesertas as $no => $peserta)
                            <tr>
                                <td>{{ $no+1 }}</td>
                                <td><a href="{{ route('admin.tim.show', ['tim' => $peserta->tim->id]) }}">{{ $peserta->tim->nama_tim }}</a></td>
                                <td>{{ $peserta->tim->kategori->nama_kategori }}</td>
{{--                                <td>{{ $peserta->tim->kategori->nama_kategori }}</td>--}}
                            </tr>
                        @endforeach
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

@endsection