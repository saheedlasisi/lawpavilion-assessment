<?php

namespace App\Exports;

use App\ConsolidatedOrders;
use Maatwebsite\Excel\Concerns\FromCollection;

class ConsolidatedOrdersExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return ConsolidatedOrders::all();
    }
}
