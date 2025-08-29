@extends('admin.layouts.base')

{{--Page Title--}}

@section('title', 'Post')

{{--Custom CSS--}}

@section('css')

@endsection

{{--App Title--}}

@section('app-title', 'Daftar Post')
@section('app-description', 'Daftar post IDL')

{{--Content--}}

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <table class="table table-hover table-bordered" id="sampleTable">
                        <thead>
                        <tr>
                            <th width="5%">No</th>
                            <th width="25%">Title</th>
                            <th width="40%">Desc</th>
                            <th width="7%">Author</th>
                            <th width="13%">Created at</th>
                            <th width="10%">Action</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($posts as $key => $post)
                        <tr>
                            <td>{{ $posts['current_page'] * $posts['per_page'] + ($key + 1) }}</td>
                            <td>{{ $post->title }}</td>
                            <td>{{ strlen($post->description) > 50 ? substr($post->description, 0, 50) . '...' : $post->description }}</td>
                            <td>{{ $post->user->name }}</td>
                            <td>{{ date('d/m/Y H:i', strtotime($post->created_at)) }}</td>
                            <td>
                                <a href="{{ route('admin.post.edit', ['post' => $post->id]) }}" class="btn btn-info">Edit</a>
                                <button onclick="deletePost({{ $post->id }})" class="btn btn-danger">Delete</button>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                        {{ $posts->links() }}
                    </table>
                    <form action="{{ route('admin.post.destroy', ['post' => -1]) }}" method="post" id="delete-form">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

{{--Custom Javascript--}}

@section('js')
    <script>
        function deletePost(id){
            var c = confirm("Are you sure delete this post?");
            if(c == true){
                url = $('#delete-form').attr('action');
                url = url.substring(0, url.length-2) + id;
                url = $('#delete-form').attr('action', url);
                // return;
                $('#delete-form').submit();
            } else {

            }
        }
    </script>
@endsection