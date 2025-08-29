@extends('layouts.base')

@section('title', 'IDLe | ' .$post->title)

@section('css')
<style media="screen">
  label{
    color: white;
    font-weight: bold;
  }
  body{
    background-color: #F3F2F0;
  }
  .card{
    border-radius: 10px;
    padding: 25px 10%;
    min-height: 500px;
  }
  .hero a{
    color: var(--primer);
    text-decoration: none;
    font-weight: bold;
  }
  .hero p{
    color: var(--sekunder);
  }
  .hero b{
    font-weight: 200;
    color: var(--primer);
  }
</style>
@endsection

@section('content')
    <div class="container hero" style="margin-top: 1px;">
        <div class="row">
            <div class="col-md-12" style="height: auto;padding-top: 62px;">
                <div style="margin-bottom: 11px;">
                    <h1  style="color: rgb(0,0,0);margin-top: 71px;, sans-serif;"></h1>
                    <h1 class="text-center page_title">Berita Idle</h1>
                    <a href="{{ route('post.show', ['post' => $post->id]) }}"><h3 class="text-center">{{ $post->title }}</h3></a>
                    <p class="text-center"><csmall>Tanggal:{{ date('d/m/Y - H:i', strtotime($post->created_at)) }}</csmall>
                    |
                    <csmall2>Oleh: <b>{{ $post->user->name }}</b></csmall2></p>
                </div>
            </div>
        </div>
    </div>

    <!-- *****************************************************************************************************************
       BLOG CONTENT
       ***************************************************************************************************************** -->
       <div class="card">
           <a href="{{$post->tumbnail}}" class="align-self-center">
           		<img src="{{$post->tumbnail}}" alt="" width="400">
           </a>
           <div class="card-body" style="margin: 0 auto; width:80%;">
               <div class="row">
                   <div class="col-auto col-md-8 align-self-center blog">
                     {!! $post->description !!}
                   </div>
               </div>
           </div>
      </div>
@endsection
@section('js')
  <script type="text/javascript">
      $('#id').hide()
  </script>
@endsection
