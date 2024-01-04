<?php

namespace App\Exports;

use App\Models\KategoriKonversi;
use Maatwebsite\Excel\Concerns\FromCollection;

class KategoriKonversiExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return KategoriKonversi::all(['kode_mk','nama','jumlah_sks']);
    }
    public function headings(){
        return ['kode_mk','nama','jumlah_sks'];
    }
}