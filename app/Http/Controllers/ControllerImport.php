<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Imports\RoomImport;
use Maatwebsite\Excel\Facades\Excel;
use Common;
use PHPExcel_IOFactory,
    PHPExcel_Cell;
class ControllerImport extends Controller
{
    // import file excel
    public function importExcel(Request $request)
    {
        // import file excel use maatwebsite/Excel 3.1.0
        Excel::import(new RoomImport(),$request->file('file'));
        return 'import success';
    }

    // import file excel use maatwebsite/Excel 2.1.0
    public function importExcel1(Request $request)
    {
        $data =[];
        $data=Common::ImportExcel($request->file('file')); 

        // count : number of rows in sheet (file excel 1 sheet)
        // count : number of sheets ( file excel > 1 sheet)
        // first row : key array
        for($i=0;$i <count($data[1]);$i++)
        {
            // set sheet 1 row $i key 'name_room'
            echo $data[1][$i]['name_room'].'<br/>';
        }  
        
    }
    
    // import file with phpoffice/phpspreadsheet
    public function importExcel2(Request $request)
    {
        $data =[];
        $data=Common::readExcel($request->file('file')); 
        for($i=0;$i <count($data);$i++)
        {
            for($j=0;$j<count($data[$i]);$j++)
            {
                echo $data[$i][$j]."<br/>";
            }
        }  
    }

    // get options in file 
    public function getOptionFile(Request $request)
    {
        $value= $request->file('file');
        
        // get file
        echo 'file: '.$value->getClientOriginalName();
        echo '<br/>';
        
        //get name file 
        echo 'name file: '.pathinfo($value->getClientOriginalName(),PATHINFO_FILENAME);
        echo '<br/>';
        
        // display file extension
        echo 'file Extension: '.$value->getClientOriginalExtension();
        echo '<br/>';
        
        // display file size
        echo 'file Size: '.$value->getSize();
        echo '<br/>';
        
        // display content file 
        echo $value->get();
    }
}
