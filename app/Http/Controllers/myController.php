<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\room;
class myController extends Controller
{
    //
    public function xinchao(){
        echo 'test call controller';
    }
    public function getvalue($values)
    {
        echo "values : ".$values;
        
    }

    // controller -> route
    public function exchangeroute(){
        // call name route
        
        return redirect()->route('xx');
    }
    // get value from url
    public function getvalueURL(Request $request )
    {
        echo $request->name;
        echo $request->pass;
        if($request->hasFile('file') )
        {
            $newfile= $request->file('file');
            // get name image (random)
            $nameimge= Rand();
            // move file ( public/img)
            $newfile ->move('img',$nameimge.'.jpg');
            echo 'has file';
        }
        else{
            echo 'no file';
        }
        
    }

    // get value from controller to view
    public function showView(Request $value){
       
        // create session
        session()->put('text','test session');
      
        // get value for view
        return view('show',['name' =>$value->name, 'pass'=> $value->pass]);
    }

    // test view Room
    public function ViewRoom(){
        // query Room
        $val= Room::where('value','=','4')->get();
        
        return view('viewExcel',['room'=>$val]);
    }
}
