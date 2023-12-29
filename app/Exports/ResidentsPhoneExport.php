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
        return BarangayResidents::select('phone', 'name', 'sex', 'birthdate', 'age', 'first_name', 'middle_name', 'last_name')->get();

    } // End method

    /**
     * @param mixed $resident
     * @return array
     */
    public function map($resident): array
    {
        return [
            'phone' => "'" . $resident->phone, // Prefixing with "'" ensures Excel treats it as text
            'name' => $resident->name,
            'sex' => $resident->sex,
            'birthdate' => $resident->birthdate ? (new \DateTime($resident->birthdate))->format('m/d/Y') : '',
            'age' => $resident->age,
            'first_name' => $resident->first_name,
            'middle_name' => $resident->middle_name,
            'last_name' => $resident->last_name,
        ];

    } // End method
}