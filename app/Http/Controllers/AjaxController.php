<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TypeRoom;
class AjaxController extends Controller
{
    //
    function getquery()
    {
        $limit =20;
        // skip: from , take : to
        $date = TypeRoom::skip(3)->take(5)->get();
        
        return view('showAjax',['date'=>$date]);
    }

    function postquery($param)
    {
        $pagesize=5;
        $from =($param-1)*$pagesize;
        $data = TypeRoom::skip($from)->take($pagesize)->get();
        foreach($data as $val){
            echo ("<br/>".$val->nametype."<br/>");
        }
    }
}
