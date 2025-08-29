@extends('admin.layouts.base')

{{--Page Title--}}

@section('title', 'Admin Dashboard')

{{--Custom CSS--}}
<style media="screen">
.tile {
  overflow-x: auto;
}
</style>
@section('css')

@endsection

{{--App Title--}}

@section('app-title', 'Dashboard')
@section('app-description', 'Dashboard untuk ' . \Illuminate\Support\Facades\Auth::user()->name)

{{--Content--}}

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="tile">
                <h3 class="tile-title">Total Peserta IDL</h3>
                {!! $totalPesertaChart->container() !!}
            </div>
        </div>

        <div class="col-md-6">
            <div class="tile">
                <h3 class="tile-title">Total Tim</h3>
                {!! $totalTimChart->container() !!}
            </div>
        </div>
    </div>
@endsection

{{--Custom Javascript--}}

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/highcharts/6.0.6/highcharts.js" charset="utf-8"></script>

    {!! $totalTimChart->script() !!}
    {!! $totalPesertaChart->script() !!}

    <script>



        {{--data = $.ajax({--}}
            {{--type: "GET",--}}
            {{--url: "{{ route('admin.ajax.tims') }}",--}}
            {{--async: false,--}}
            {{--dataType: 'json',--}}
            {{--done: function(data){--}}
                {{--console.log(data);--}}
            {{--},--}}
        {{--}).responseJSON;--}}

        {{--console.log(data);--}}
        {{--console.log("test");--}}

        {{--var pdata = [--}}
            {{--{--}}
                {{--value: 300,--}}
                {{--color:"#F7464A",--}}
                {{--highlight: "#FF5A5E",--}}
                {{--label: "Red"--}}
            {{--},--}}
            {{--{--}}
                {{--value: 50,--}}
                {{--color: "#46BFBD",--}}
                {{--highlight: "#5AD3D1",--}}
                {{--label: "Green"--}}
            {{--},--}}
            {{--{--}}
                {{--value: 100,--}}
                {{--color: "#FDB45C",--}}
                {{--highlight: "#FFC870",--}}
                {{--label: "Yellow"--}}
            {{--}--}}
        {{--];--}}

        // var ctxp = $("#timChart").get(0).getContext("2d");
        // var pieChart = new Chart(ctxp).Pie(data);
    </script>
@endsection
