<?php

namespace App\Exports;

use App\Model\Sale;
use Maatwebsite\Excel\Concerns\FromCollection;

class SaleExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Sale::with('saleProduct', 'customer')->get();
    }
}
