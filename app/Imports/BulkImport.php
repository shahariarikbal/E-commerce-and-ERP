<?php

namespace App\Imports;

use App\Model\Product;
use App\Model\WebProduct;
use Maatwebsite\Excel\Concerns\ToModel;

class BulkImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Product([
            'name'                   => $row[3],
            'product_model'          => $row[4],
            'sku'                    => $row[10],
            'short_description'      => $row[11],
            'sale_price'             => $row[18],
            'qty'                    => $row[2],
        ]);
    }
}
