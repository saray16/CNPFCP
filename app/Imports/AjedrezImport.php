<?php

namespace App\Imports;

use App\Models\Actividad;
use Maatwebsite\Excel\Concerns\ToModel;

class AjedrezImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Actividad([
            //
        ]);
    }
}
