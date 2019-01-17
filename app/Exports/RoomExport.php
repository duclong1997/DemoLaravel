<?php

namespace App\Exports;

use App\Room;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
// set auto size for column
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;

class RoomExport implements FromView, ShouldAutoSize, WithHeadings
{
    /**
    * @return \Illuminate\Support\view
    */
    public function view() : View
    {
        // get excel by  view blade
        return view('viewExcel', [
            'room' => Room::where('value','=','4')->get()
        ]);
     
    }

    public function headings():array
    {
        return[
            '#',
            'room',
            'value',
            'start time',
            'gender',
            'price'
        ];
    }
    
}
