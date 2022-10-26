<?php

namespace App\Exports;

use App\User;
use App\SaveChangesByAdmin;
use Maatwebsite\Excel\Concerns\FromCollection;

class AdminChangesExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return SaveChangesByAdmin::all();
    }
}