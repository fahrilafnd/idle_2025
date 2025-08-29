<?php

namespace App\Exports;

use App\Tim;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TimExport implements FromCollection, ShouldAutoSize, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $tims = Tim::with('kategori', 'mahasiswa')->get();
        $result = [];
        foreach ($tims as $tim){
            $temp = new \stdClass();
            $temp->kategori = $tim->kategori->nama_kategori;
            $temp->nama_tim = $tim->nama_tim;
            $temp->ketua_tim = $tim->mahasiswa->nama . "(" . $tim->mahasiswa->nim . ")";
            $temp->email = $tim->mahasiswa->email;
            $temp->no_hp = $tim->mahasiswa->no_hp;
            array_push($result, $temp);
        }
        return collect($result);
    }

    public function headings(): array
    {
        return [
            'Kategori',
            'Nama Tim',
            'Ketua',
            'Email',
            'No HP'
        ];
    }
}
