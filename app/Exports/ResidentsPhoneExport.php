<?php

namespace App\Exports;

use App\Models\BarangayResidents;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;

class ResidentsPhoneExport implements FromCollection, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return BarangayResidents::select('phone')->get();

    } // End method

    /**
     * @param mixed $resident
     * @return array
     */
    public function map($resident): array
    {
        return [
            'phone' => "'" . $resident->phone, // Prefixing with "'" ensures Excel treats it as text
        ];

    } // End method
}