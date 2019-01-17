<?php
//app/Helpers/CommonHelper.php
namespace App\Helpers;
use App\Room;
use App\Exports\RoomExport;
use PHPExcel_IOFactory,
    PHPExcel_Cell;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Maatwebsite\Excel\Facades\Excel;
use PhpOffice\PhpSpreadsheet\Style\Fill;

class CommonHelper {
    
    // function common 
    // export file excel 2.1.0
    public static function exportExcel() {
        // create file excel
        Excel::create('testExcel',function($excel){
            // create 1 sheet
            $excel->sheet('firstSheet',function($sheet) {
                     // create query SQL
                    $value= Room::where('value','=','4')->get();
                    
                    // set query -> excel
                    // way 1: use from array 
                    // $sheet->fromArray($value);
                    
                    // way 2: use from Model in table
                    // $sheet->fromModel($value);

                    // way 3 : use load view blade with parameter
                    $valueView = Room::where('value','=','4')->get();
                    // load view
                    $sheet->loadView('viewExcel')->with('room',$valueView);

                    // set size for cell or column or row
                    // $sheet->setSize('A1:J1', 30, 30);
                    
                    // Set auto size for sheet
                    $sheet->setAutoSize(true);
                    
                    // set style cell from A1 -> J1
                    // $sheet->cell('A1:J1',function($cell){
                        //set vale 
                        // $cell->setValue('data1');
                    
                        //set background
                        // $cell->setBackground('#00ff00');
                        // set font color
                        // $cell->setFontColor('#ff0000');
                        // set font size
                        // $cell->setFontSize(16);
                        // font family
                        // $cell->setFontFamily('Calibri');
                        // Set font weight to bold
                        // $cell->setFontWeight('bold');
                    // });
            });
          
            // create 2 sheet
            $excel->sheet('secondSheet',function($sheet) {
                     // create query SQL
                    $value= Room::where('value','=','4')->get();
                    
                    // set query -> excel
                    // way 1: use from array 
                    $sheet->fromArray($value);
                    
                    // way 2: use from Model in table
                    // $sheet->fromModel($value);

                    // way 3 : use load view blade with parameter
                    // $valueView = Room::where('value','=','4')->get();
                    // load view
                    // $sheet->loadView('viewExcel')->with('room',$valueView);

                    // set size for cell or column or row
                    $sheet->setSize('A1:J1', 30, 30);
                    
                    // Set auto size for sheet
                    $sheet->setAutoSize(true);
                    
                    // set style cell from A1 -> J1
                    $sheet->cell('A1:J1',function($cell){
                        //set vale 
                        $cell->setValue('data1');
                    
                        //set background
                        $cell->setBackground('#00ff00');
                        // set font color
                        $cell->setFontColor('#ff0000');
                        // set font size
                        $cell->setFontSize(16);
                        // font family
                        $cell->setFontFamily('Calibri');
                        // Set font weight to bold
                        $cell->setFontWeight('bold');
                    });
            });
            // create 3 sheet
            $excel->sheet('thirdSheet',function($sheet) {
                // create query SQL
               $value= Room::where('value','=','4')->get();
               
               // set query -> excel
               // way 1: use from array 
                // $sheet->fromArray($value);
               
               // way 2: use from Model in table
               $sheet->fromModel($value);

               // way 3 : use load view blade with parameter
                // $valueView = Room::where('value','=','4')->get();
               // load view
                // $sheet->loadView('viewExcel')->with('room',$valueView);

               // set size for cell or column or row
               $sheet->setSize('A1:J1', 30, 30);
               
               // Set auto size for sheet
               $sheet->setAutoSize(true);
               
               // set style cell from A1 -> J1
               $sheet->cell('A1:J1',function($cell){
                   //set value 
                   $cell->setValue('data1');
                   //set background
                   $cell->setBackground('#00ff00');
                   // set font color
                   $cell->setFontColor('#ff0000');
                   // set font size
                   $cell->setFontSize(16);
                   // font family
                   $cell->setFontFamily('Calibri');
                   // Set font weight to bold
                   $cell->setFontWeight('bold');
               });
            });

        })->export('xlsx');
        return 'download success';
    }

    // export file excel  maatwebsite 3.1
    public static function downloadExcel(){
        // download by view
        return  Excel::download(new RoomExport, 'ReportRoom.xlsx');
         
    }
    // export file excel with phpOffice/phpspreadsheet
    public static function downloadExcel1(){
        // create query SQL
        $value= Room::all();
        $spreadsheet = new Spreadsheet();
        
        // Create a first sheet, representing sales data, index 0
        $spreadsheet->setActiveSheetIndex(0);
        $sheet = $spreadsheet->getActiveSheet();
        // set name sheet
        $sheet->setTitle('table Room');
        // set auto size column
        $sheet->getColumnDimension('B')
        ->setAutoSize(true);
      
        // set name column in table -> cell
        $sheet->setCellValue('A1', 'id');
        $sheet->setCellValue('B1', 'name');
        $sheet->setCellValue('C1', 'value');
        $sheet->setCellValue('D1', 'price');
        $sheet->setCellValue('E1', 'gender');
        $sheet->setCellValue('F1', 'starttime');

        // set color in font cell
        $sheet->getStyle('A1:F1')
        ->getFont()->getColor()->setARGB('0000ff');

        // set background for cell
        $sheet->getStyle('A1:F1')->getFill()
        ->setFillType(Fill::FILL_SOLID)
        ->getStartColor()->setARGB('ffff00');
        
        // new sheet
        $spreadsheet->createSheet();    
        //sheet  index 1
        $spreadsheet->setActiveSheetIndex(1);
        $sheet = $spreadsheet->getActiveSheet();
        // set name sheet
        $sheet->setTitle('value table room');
        // get array object -> cell
        // i: row, j: column
        for ($i=2;$i<count($value);$i++){
            $j=0;
            $j++;
            $sheet->setCellValueByColumnAndRow($j, $i, $value[$i]->id);
            $j++;
            $sheet->setCellValueByColumnAndRow($j, $i, $value[$i]->nameroom);
            $j++;
            $sheet->setCellValueByColumnAndRow($j, $i, $value[$i]->value);
            $j++;
            $sheet->setCellValueByColumnAndRow($j, $i, $value[$i]->price);
            $j++;
            $sheet->setCellValueByColumnAndRow($j, $i,  $value[$i]->gender);
            $j++;
            $sheet->setCellValueByColumnAndRow($j, $i, $value[$i]->starttime);
        }
        
        $writer = new Xlsx($spreadsheet);
        $filename = 'ReportRoom1';
 
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"');
        header('Cache-Control: max-age=0');
        $writer->save('php://output'); // download file
    }


    // read file excel with phpOffice/phpspreadsheet
    public static function readExcel($file){
        $objFile = PHPExcel_IOFactory::identify($file);
        $objData = PHPExcel_IOFactory::createReader($objFile);
        $objData->setReadDataOnly(true);
        $objPHPExcel = $objData->load($file);
        // read sheet index 0
        $sheet = $objPHPExcel->setActiveSheetIndex(0);
        $Totalrow = $sheet->getHighestRow();
        $LastColumn = $sheet->getHighestColumn();
        $TotalCol = PHPExcel_Cell::columnIndexFromString($LastColumn);
        $data = [];

        for ($i = 1; $i <= $Totalrow; $i++) {
            for ($j = 0; $j < $TotalCol; $j++) {
                $data[$i - 1][$j] = $sheet->getCellByColumnAndRow($j, $i)->getValue();;
            }
        }
        return $data;
    } 

    // import file excel with maatwebsite/Excel 2.1.0
    // row 1 use as key in array.
    public static function ImportExcel($file){
        $data = [];
        // read all in file import
        $data=Excel::load($file,function($reader){

            // $data1 = [];
            // // read by sheet index
            // $sheet=$reader->getSheet(1);
            // $Totalrow = $sheet->getHighestRow();
            // $LastColumn = $sheet->getHighestColumn();
            // // convert String column -> number
            // $TotalCol = PHPExcel_Cell::columnIndexFromString($LastColumn);
            //  // read cell
            // for ($i = 1; $i <= $Totalrow; $i++) {
            //     for ($j = 0; $j < $TotalCol; $j++) {
            //         $data1[$i - 1][$j] = $sheet->getCellByColumnAndRow($j, $i)->getValue();
            //         // test data file excel import
            //          echo $data1[$i - 1][$j];
            //     }
            // }

        // get result in file import
        })->get();
    
       return $data;      
    }
}
?>