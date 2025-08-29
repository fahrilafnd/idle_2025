@extends('admin.layouts.base')

{{--Page Title--}}

@section('title', 'Post')

{{--Custom CSS--}}

@section('css')

@endsection

{{--App Title--}}

@section('app-title', 'Upload Image')
@section('app-description', '')

{{--Content--}}

@section('content')
    @if($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          {{ $message }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <h3 class="tile-title">Upload Image</h3>
                <form method="post" action="{{ route('admin.post-image.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="titlePost">Judul</label>
                        <input class="form-control" id="titlePost" type="text" aria-describedby="titleHelp" name="title"
                               placeholder="Enter Title">
                    </div>
                    <div class="form-group">
                        <label for="titlePost">Tags</label>
                        <input class="form-control" id="titlePost" type="text" aria-describedby="titleHelp" name="tags"
                               placeholder="Tags dipisahkan dengan _">
                    </div>

                    <div class="form-group">
                        <input type="file" name="file" required>
                    </div>

                    <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Upload
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection

{{--Custom Javascript--}}

@section('js')

@endsection
