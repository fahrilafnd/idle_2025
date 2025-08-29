@extends('beautymail::templates.sunny')

@section('content')

    @include ('beautymail::templates.sunny.heading' , [
        'heading' => 'Hello ' . $nama,
        'level' => 'h1',
    ])

    @include('beautymail::templates.sunny.contentStart')

    <p>{{ $text }}</p>

    @include('beautymail::templates.sunny.contentEnd')
@stop