<?php

namespace App\Exports;

use App\Model\Purchase;
use Maatwebsite\Excel\Concerns\FromCollection;

class PurchaseExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Purchase::with('purchaseProduct', 'supplier')->get();
    }
}
