Hello <i>{{ $data->receiver }}</i>
<p>Anda telah terdaftar pada event Ilkom Developer League (IDLe) dalam kategori lomba {{ $data->kategori }}</p>

<p><u>Berikut adalah code untuk submit karya tulis</u></p>

<div>
    <b>{{ $data->submission_code }}</b>
</div>

Terima Kasih,
{{ $data->sender }}