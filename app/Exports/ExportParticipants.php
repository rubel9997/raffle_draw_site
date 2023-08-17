<?php

namespace App\Exports;

use App\Models\Participant;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ExportParticipants implements FromCollection, WithHeadings, ShouldAutoSize,WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function collection()
    {
        return Participant::select('id', 'name', 'email','phone','coupon_code','category','created_at')->get();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Name',
            'Email',
            'Phone',
            'Coupon Code',
            'Category',
            'Created At',
        ];
    }

    public function map($participant): array
    {
        return [
            $participant->id,
            $participant->name,
            $participant->email,
            $participant->phone,
            $participant->coupon_code,
            $participant->category,
            $participant->created_at->format('Y-m-d H:i A'),
        ];
    }


}
