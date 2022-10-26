<?php

namespace App\Exports;

use App\User;
use App\RegistrationForm;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class UsersExport implements FromCollection, WithHeadings
{
    public function headings(): array
    {
        return [
            '#',
            'name',
            'order_id',
            'order_status',
            'currency',
            'nick_name',
            'department',
            'exam_session',
            'graduation_year',
            'attachment',
            'room_no',
            'hall_duration',
            'birthdate',
            'gender',
            'present_address',
            'hobby',
            'postcode',
            'mobile_1',
            'mobile_2',
            'email',
            'occupation',
            'position',
            'organization',
            'spouse_name',
            'spouse_profession',
            't_shirt',
            'lunch',
            'dinner',
            'l',
            'd',
            'driver',
            'total_amount',
            'payment_method',
            'added_by',
            'image',
            'created_at',
            'updated_at',
        ];
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return RegistrationForm::where('order_status', '<>', 'Failed')->get();
    }
}