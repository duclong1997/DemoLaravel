<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class ControllerLogin extends Controller
{
    // function check login(store)
    public function checkLog(Request $request)
    {
        // get parameter
        $name = $request->user;
        $pass = $request->pass;
        // select query multi where 
        $query = DB::table('room')->select('nameroom','value','gender','starttime')->where([
            ['nameroom','=',$name ] , 
            ['value','=',$pass ] 
        ])->get();
        // set size for array
        if (count($query) !=0)
        {
            // update data in table
            DB::table('room')->where([ 
                                        ['nameroom',$name],
                                        ['value',$pass]
                                        ])->update(['nameroom'=>'hung','value'=>'4']);
            // noi cac string voi nhau  thong qua .
            session()->put('user',$name." login");
            return view('show',['vla'=>$query]);
        }
        else{
            return view('viewLogin',['value'=>$name,'check'=>'not correct']);
        }
    }
}
