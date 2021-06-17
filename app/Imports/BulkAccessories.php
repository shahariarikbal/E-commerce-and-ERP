<?php

namespace App\Imports;

use App\Model\Accessories;
use Maatwebsite\Excel\Concerns\ToModel;

class BulkAccessories implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Accessories([
            'name'                   => $row[2],
            'model'                  => $row[3],
            'sku'                    => $row[9],
            'price'                  => $row[14],
        ]);
    }
}
