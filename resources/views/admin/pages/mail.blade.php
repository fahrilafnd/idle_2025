@extends('admin.layouts.base')

{{--Page Title--}}

@section('title', 'Mail')

{{--Custom CSS--}}

@section('css')
    @csrf
@endsection

{{--App Title--}}

@section('app-title', 'Kirim Email')
@section('app-description', '')

{{--Content--}}

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="tile">
                <h3>Tim</h3>

                <form action="{{ route('admin.mail.tim') }}" method="post">
                    @csrf

                    <label for="tim-select">Nama Tim</label>
                    <select class="form-control" id="tim-select" multiple="" name="tims[]">
                        <optgroup label="Nama Tim">
                            @foreach($tims as $tim)
                                <option value="{{ $tim->id }}">{{ $tim->nama_tim }}</option>
                            @endforeach
                        </optgroup>
                    </select>
                    <br>
                    <div class="form-group">
                        <label for="postDescription">Pesan</label>
                        <textarea class="form-control" name="pesan" rows="10" required></textarea>
                    </div>

                    <button class="btn btn-primary" type="submit"><i class=""></i>Kirim</button>

                </form>
            </div>
        </div>


        <div class="col-md-6">
            <div class="tile">
                <h3>Mahasiswa</h3>
                <form action="{{ route('admin.mail.mahasiswa') }}" method="post">
                    @csrf

                    <label for="tim-select">Nama Mahasiswa</label>
                    <select class="form-control" id="mahasiswa-select" multiple="" name="emails[]">
                        <optgroup label="Nama Mahasiswa">
                            @foreach($mahasiswas as $mahasiswa)
                                <option value="{{ $mahasiswa->email }}">{{ $mahasiswa->nim . ' - ' . $mahasiswa->nama }}</option>
                            @endforeach
                        </optgroup>
                    </select>
                    <br>
                    <div class="form-group">
                        <label for="postDescription">Pesan</label>
                        <textarea class="form-control" name="pesan" rows="10" required></textarea>
                    </div>

                    <button class="btn btn-primary" type="submit"><i class=""></i>Kirim</button>
                </form>
            </div>
        </div>

    </div>
@endsection

{{--Custom Javascript--}}

@section('js')
    <script type="text/javascript" src="{{ asset('assets/admin/js/plugins/select2.min.js') }}"></script>

    <script>
        $('#mahasiswa-select').select2();
    </script>

    <script>
        $('#tim-select').select2();
    </script>


@endsection