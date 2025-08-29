@extends('admin.layouts.base')

{{--Page Title--}}

@section('title', 'Mahasiswa')

{{--Custom CSS--}}

@section('css')

@endsection

{{--App Title--}}

@section('app-title', 'Edit Mahasiswa')
@section('app-description', '')

{{--Content--}}

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <h3 class="tile-title">Edit Mahasiswa</h3>
                <form method="post" action="{{ route('admin.mahasiswa.update', ['mahasiswa' => $mahasiswa->nim]) }}">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <label for="titlePost">NIM</label>
                        <input class="form-control" id="titlePost" type="text" value="{{ $mahasiswa->nim }}" disabled>
                    </div>

                    <div class="form-group">
                        <label for="titlePost">Nama</label>
                        <input class="form-control" id="titlePost" type="text" value="{{ $mahasiswa->nama }}" name="nama">
                    </div>

                    <div class="form-group">
                        <label for="titlePost">Email</label>
                        <input class="form-control" id="titlePost" type="text"value="{{ $mahasiswa->email }}" name="email">
                    </div>

                    <div class="form-group">
                        <label for="titlePost">No HP</label>
                        <input class="form-control" id="titlePost" type="text" value="{{ $mahasiswa->no_hp }}" name="no_hp">
                    </div>

                    <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection

{{--Custom Javascript--}}

@section('js')

@endsection