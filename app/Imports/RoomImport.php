<?php

namespace App\Imports;

use App\Room;
use Maatwebsite\Excel\Concerns\ToModel;

class RoomImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Room([
            // set value column table -> column excel
            'nameroom'=>$row[1],
            'value'=>$row[2],
            'starttime'=>$row[3],
            'gender'=>$row[4],
            'price'=>$row[5],
            'id_type'=>1,
        ]);
    }
}
