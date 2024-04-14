<?php

namespace App\Exports;

use Illuminate\Contracts\Support\Responsable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;

class JsonExport implements FromCollection, Responsable
{
    use Exportable;

    protected $data;

    public function __construct($data)
    {
        $this->data = collect($data);
    }

    public function collection()
    {
        return $this->data;
    }
    public function headings(): array
    {
        // Get column names from the first row of the data
        return array_keys($this->data->first());
    }
}
