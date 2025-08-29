<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">

  </head>
  <body>
    <h1>Hai, {{$tim->nama_tim}}</h1>
    <p>Tim Anda telah melakukan pengiriman berkas <b>tahap {{$tim->babak}}</b> pada bidang lomba <b>{{$kategori}}</b>.
    Berikut daftar anggota dari kelompok ini yaitu:</p>
      <ul>
      @foreach ($peserta as $mahasiswa)
        <li>{{$mahasiswa->nama}} ({{$mahasiswa->nim}})</li>
      @endforeach
      </ul>
    <p>Harap simpan email ini sebagai bukti saat penilaian project UAS.</p>
    <p>Tertanda,<br><br><b>Panitia IDLE 2021</b></p>
  </body>
</html>
