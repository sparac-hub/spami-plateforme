<?php

namespace App\Exports;

use App\Models\Cms\ContactMessage;
use Maatwebsite\Excel\Concerns\FromCollection;

class ContactMessagesExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return ContactMessage::all();
    }
}
