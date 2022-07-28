<?php

namespace App\Exports;

use App\Models\Postuler;
use Maatwebsite\Excel\Concerns\FromCollection;

class PostulerExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {

        return Postuler::select('cv','lettre','status')->get();
    }

    public function headings(): array {
        return ["Nom", "Prefession", "Nationnalié","Lettre de motivation","Status","Cv"];
    }
}
