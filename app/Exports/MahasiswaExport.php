<?php

namespace App\Exports;

use App\Mahasiswa;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;

class MahasiswaExport implements FromCollection, ShouldAutoSize, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $result = [];
        $mahasiswas = Mahasiswa::with('pesertas')->get();
        foreach ($mahasiswas as $mahasiswa){
            $temp = new \stdClass();
            $temp->nim = $mahasiswa->nim;
            $temp->nama = $mahasiswa->nama;
            $temp->email = $mahasiswa->email;
            $temp->no_hp = $mahasiswa->no_hp;
            $temp->jumlah_lomba = count($mahasiswa->pesertas);
            array_push($result, $temp);
        }
        return collect($result);
    }

    public function headings(): array
    {
        return [
            'NIM',
            'Nama',
            'Email',
            'No HP',
            'Jumlah Lomba'
        ];
    }
}
