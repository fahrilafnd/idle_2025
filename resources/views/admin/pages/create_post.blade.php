@extends('admin.layouts.base')

{{--Page Title--}}

@section('title', 'Post')

{{--Custom CSS--}}

@section('css')
    <!-- Include external CSS. -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet"
          type="text/css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/codemirror.min.css">
@endsection

{{--App Title--}}

@section('app-title', 'Tambah Post')
@section('app-description', '')

{{--Content--}}

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <h3 class="tile-title">Create Post</h3>
                <form method="post" action="{{ route('admin.post.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="titlePost">Title Post</label>
                        <input class="form-control" id="titlePost" type="text" aria-describedby="titleHelp" name="title"
                               placeholder="Enter Title" required>
                        <small class="form-text text-muted" id="titleHelp">
                            For Post title
                        </small>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="titlePost">Category</label>
                                <select class="form-control" name="kategori">
                                      <option value="0"disabled>--Select Category--</option>
                                      <option value="Umum" selected>Umum</option>
                                    @foreach(\App\Kategori::where('id_ormawa', \Illuminate\Support\Facades\Auth::user()->id_ormawa)->get() as $kategori)
                                      <option value="{{$kategori->kategori}}">{{$kategori->nama_kategori}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-9">
                                <label for="tumbnail">Tumbnail URL</label>
                                <input class="form-control" id="tumbnail" type="text" aria-describedby="tumbnail" name="tumbnail"
                                       placeholder="Image URL for Tumbnail">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="postDescription">Description</label>
                        <textarea class="form-control" name="description" rows="10" id="editor" required></textarea>
                    </div>
                    <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Publish
                    </button>
                </form>
            </div>
        </div>
    </div>
	<script>
      	// CKEditor
    	CKEDITOR.replace( 'editor' );
	</script>
@endsection

{{--Custom Javascript--}}

@section('js')
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/codemirror.min.js"></script>
    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/mode/xml/xml.min.js"></script>
@endsection
