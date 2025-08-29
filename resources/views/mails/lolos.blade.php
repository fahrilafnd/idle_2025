@extends('beautymail::templates.sunny')

@section('content')
    
     
    @include ('beautymail::templates.sunny.heading' , [
        'heading' => 'Selamat',
        'level' => 'h1',
    ])

    @include('beautymail::templates.sunny.contentStart')

    <p>Selamat kepada Tim <b> {{ $tim_->nama_tim }} </b>, Tim anda berhasil lolos ke {{ $tahap }} dalam kategori {{ $kategori->nama_kategori }}.</p>

    @include('beautymail::templates.sunny.contentEnd')
    
    @include('beautymail::templates.sunny.contentStart')
    @if($kategori->kategori == 'cpc')
        <p>Silahkan tunggu informasi selanjutnya dari email</p>
    @elseif ($kategori->kategori == 'data-mining' or 'uiux')
        @include('beautymail::templates.sunny.contentStart')
        <p>Silahkan submit karya tulis anda dengan cara menekan tombol di bawah ini : </p>
        @include('beautymail::templates.sunny.contentEnd')
        
        @include('beautymail::templates.sunny.contentStart')
        @include('beautymail::templates.sunny.button', [
        	'title' => 'Submit',
        	'link' => route('kompetisi.submit.index', ['kategori' => $kategori->kategori, 'token' => $kode])])
         @include('beautymail::templates.sunny.contentEnd')
         
        @include('beautymail::templates.sunny.contentStart')
        <p>atau akses link berikut : <a href="{{ route('kompetisi.submit.index', ['kategori' => $kategori->kategori, 'token' => $kode]) }}">{{ route('kompetisi.submit.index', ['kategori' => $kategori->kategori, 'token' => $kode]) }}</a></p>
        @include('beautymail::templates.sunny.contentEnd')
        
    @else

        <p>Silahkan submit ke babak selanjutnya dengan klik tombol dibawah : </p>
        @include('beautymail::templates.sunny.button', [
        	'title' => 'Submit',
        	'link' => route('kompetisi.submit.index', ['kategori' => $kategori->kategori, 'token' => $kode])])

        
        <p>atau akses link berikut : <a
                    href="{{ route('kompetisi.submit.index', ['kategori' => $kategori->kategori, 'token' => $kode]) }}">{{ route('kompetisi.submit.index', ['kategori' => $kategori->kategori, 'token' => $kode]) }}</a></p>

    @endif
    @include('beautymail::templates.sunny.contentEnd')
@stop