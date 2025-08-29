@extends('layouts.base')

@section('title', 'Daftar Tim ' . $kategori->nama_kategori)

@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
<style media="screen">
  body{
    background-color: #F3F2F0;
  }
  .card{
    border-radius: 10px;
    padding: 25px 10%;
    min-height: 500px;
  }
  h2{
    text-align: center;
  }
  thead{
    background-color: var(--primer);
  }
  /* stupid css */
  #peserta_length,
  #peserta_info{
    display: none;
  }
  #peserta_filter,
  .pagination{
    display: flex;
    flex-direction: row;
    justify-content: flex-end;
  }
  .page-item.active .page-link{
    background-color: var(--primer);
    border-color: transparent;
  }
  .page-link{
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
                    <h1 class="text-center page_title">Daftar Peserta {{ $kategori->nama_kategori }}</h1>
                </div>
            </div>
        </div>
    </div>

    <!-- *****************************************************************************************************************
       DESCRIPTION
       ***************************************************************************************************************** -->
   <div class="card">
       <div class="card-body">
           <div class="container mtb">
               <div class="row">
                   <div class="col-sm-12 col-lg-offset-2">
                     @if($babak != 1)
                        <h2>Berikut adalah daftar peserta {{ $kategori->nama_kategori }} yang masuk pada babak {{ $babak }} dengan nilai pada babak sebelumnya</h2>
                     @endif
                       @if(count($tims) > 0)
                           <table class="table table-striped" id="peserta">
                               <thead>
                               <tr>
                                   <th width="5%" scope="col">#</th>
                                   <th width="%" scope="col">Nama</th>
                                   <th width="20%" scope="col">Score</th>
                               </tr>
                               </thead>
                               <tbody>
                               @foreach($tims as $key => $tim)
                               <tr>
                                   <th scope="row">{{ $key+1 }}</th>
                                   <td>{{ $tim->nama_tim }}</td>
                                   <td>{{ isset($tim->nilai[0]->nilai) ? $tim->nilai[0]->nilai : '-' }}</td>
                               </tr>
                               @endforeach
                               </tbody>

                           </table>
                       @else
                           <h3 style="text-align: center; opacity: 0.4">Belum ada peserta dalam
                               kategori {{ $kategori->nama_kategori }}</h3>
                       @endif
                   </div>

                   {{ $tims->links() }}
               </div>
           </div>
       </div>
   </div>

@endsection

@section('js')
    <script src="{{ asset('assets/admin/js/plugins/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/plugins/dataTables.bootstrap.min.js') }}"></script>
    <script type="text/javascript">
    $(document).ready(function () {
        $('#peserta').DataTable({
          "order": [[ 2, "desc" ]],
          "columns": [
            null,
            { "orderable": false },
            null,
          ]});
        $('.dataTables_length').addClass('bs-select');

      });
    </script>
@endsection
