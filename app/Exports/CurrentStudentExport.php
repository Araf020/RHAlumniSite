<?php

namespace App\Exports;

use App\CurrentStudent;
use App\User;
use Maatwebsite\Excel\Concerns\FromCollection;

class CurrentStudentExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return CurrentStudent::all();
    }
}