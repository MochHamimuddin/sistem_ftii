<?php

namespace App\Imports;

use App\Models\KategoriKonversi;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class KategoriKonversiImport implements ToModel, WithHeadingRow
{
    private $rowCount = 0;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $this->rowCount++;
            return new KategoriKonversi([
                'kode_mk' => $row['kode_mk'],
                'nama' => $row['nama'],
                'jumlah_sks' => $row['jumlah_sks'],
            ]);
    }
    public function getRowCount(): int
    {
        return $this->rowCount;
    }
    /**
     * Get the delimiter used in the CSV file.
     *
     * @return string
     */
    public function delimiter(): string
    {
        return ',';
    }
}
