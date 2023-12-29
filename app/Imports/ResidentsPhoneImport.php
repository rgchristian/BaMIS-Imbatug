<?php

namespace App\Imports;

use App\Models\BarangayResidents;
use Illuminate\Support\Carbon;
use Maatwebsite\Excel\Concerns\ToModel;

class ResidentsPhoneImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
{
    // Define default values in case keys are missing
    $defaultValues = [
        'phone' => null,
        'name' => null,
        'sex' => null,
        'birthdate' => null,
        'age' => null,
        'first_name' => null,
        'middle_name' => null,
        'last_name' => null,
    ];

    // Merge default values with actual values from $row
    $data = array_merge($defaultValues, [
        'phone' => $row[0] ?? null,
        'name' => $row[1] ?? null,
        'sex' => $row[2] ?? null,
        'birthdate' => $this->formatDate($row[3] ?? null),
        'age' => $row[4] ?? null,
        'first_name' => $row[5] ?? null,
        'middle_name' => $row[6] ?? null,
        'last_name' => $row[7] ?? null,
    ]);

    return new BarangayResidents($data);
}

    /**
     * Format the date from "05/01/2002 M-d-Y" to "Y-m-d".
     *
     * @param string $date
     * @return string|null
     */
    private function formatDate($date)
    {
        try {
            // Parse the date using Carbon
            $carbonDate = Carbon::createFromFormat('m/d/Y', $date);
            
            // Format the date as "Y-m-d"
            return $carbonDate->format('Y-m-d');
        } catch (\Exception $e) {
            // Handle the case where the date is not in the expected format
            // You might want to log an error or handle it according to your needs
            return null;
        }
    }
}
