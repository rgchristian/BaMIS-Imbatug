<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;

class BarangayResidents extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public function getAgeAttribute()
    {
        // Calculate the age based on the 'birthdate' attribute
        $birthdate = Carbon::parse($this->attributes['birthdate']);
        $currentDate = Carbon::now();

        return $birthdate->diffInYears($currentDate);
    }
}