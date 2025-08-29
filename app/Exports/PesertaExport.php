<?php

namespace App\Exports;

use App\Mahasiswa;
use App\Tim;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PesertaExport implements FromCollection, WithHeadings, ShouldAutoSize, WithColumnFormatting
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public $kategori;

    public function __construct($kategori, $babak=0)
    {
        $this->kategori = $kategori;
        $this->babak = $babak;
    }

    public function collection()
    {
        if($this->babak == 0){
            $tims = Tim::with('pesertas.mahasiswa')->where('id_kategori', $this->kategori)->get();
        } else {
            $tims = Tim::with('pesertas.mahasiswa')
                ->where('id_kategori', $this->kategori)
                ->where('babak', $this->babak)
                ->get();
        }

        $result = [];
        foreach($tims as $tim){
            foreach ($tim->pesertas as $peserta){
                $temp = new \stdClass();
                $temp->kategori = $tim->kategori->nama_kategori;
                $temp->nama_tim = $tim->nama_tim;
                $temp->nim = $peserta->mahasiswa->nim;
                $temp->nama = $peserta->mahasiswa->nama;
                $temp->email = $peserta->mahasiswa->email;
                $temp->no_hp = $peserta->mahasiswa->no_hp;
                array_push($result, $temp);
            }
        }
        return collect($result);
    }

    public function headings(): array
    {
        return [
            'Kategori',
            'Nama Tim',
            'NIM',
            'Nama',
            'Email',
            'No HP'
        ];
    }

    public function columnFormats(): array
    {
        return [
            'A' => '@',
            'C' => '@'
        ];
    }

}
