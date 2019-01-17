<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// create route with method (get or post), link (first) , value (function, array)
Route::get('first',function(){
    echo '<h1>hello world with route! </h1>';

    return 'long';
});

// create route with parameter 
Route::get('value/{ten}',function($ten){
    echo '<h1>hello world with route!'.$ten,'</h1>' ;

    return 'long';
});

//cach1
// dinh danh( da ten) cho route   cac route khac co the goi den no
Route::get('rootRoute',['as'=>'myrout', function(){
    return 'this is root route';
}]);

//cach 2 (recommend)
Route::get('rootRoute2',function(){
    return 'this root route 2 ';
})->name('route2');

// call other route 
// call route ,rootroute cung method
Route::get('routeCall',function(){
    // call route myroute from routeCall
    return redirect()->route('route2');
});

// group route
// route parent
Route::group(['prefix'=>'groupRoute'], function(){
    // route child
    Route::get('roud1', function(){
        echo 'roud 1';
    });
    Route::get('roud2', function(){
        echo 'roud 2';
    });
    Route::get('roud3', function(){
    
        echo 'roud 3';
    });
    Route::get('roud4', function(){
        echo 'roud 4';
    });
});


// (recommend)
// route call controller 
// method :get, link :routecontroller, name class controller: mycontroller, function: xinchao
Route::get('routecontroller','myController@xinchao');
// get value to controller, getvlaues
Route::get('routecontroller1/{values}',['as'=>'getx','uses'=>'myController@getvalue']);
// route call controller , controller call route
Route::get('routecontroller2','myController@exchangeroute');

// route call view 
Route::get('viewLogin',function (){
    // call file view 
    return view('form');
})->name('xx');

// route request data from view  to controller (use name of route and use controller)
Route::post('getData',['as'=>'getdataform','uses'=>'myController@getvalueURL']);

// get value for view  (route name = getdataform2, go controller =myController, method =showView) 
Route::post('getData2',['as'=>'getdataform2','uses'=>'myController@showView']);

// view login
Route::get('Login',function(){
    return view('viewLogin');
});
// view -> controller 
Route::post('controlLoign',['as'=>'login','uses'=>'ControllerLogin@checkLog']);


// add table = schema
Route::get('createTable',function(){
    // create table 
    Schema::create('room',function($table){
        // create colume id auto increase ( primary key)
        $table->increments('id');
        // create primary key 
        // $table->primary('id');
        // create security
        $table->rememberToken("key");
        // colume type vachar, size:200
        $table->string('nameroom',200);
        // creat colume with integer
        $table->integer('value');
        // create colum with time ,dateTime, date
        $table->time('starttime');
        // create colum with time now creaed_at and updated_at
        $table->timestamps();
        //  create colum with boolean
        $table->boolean('gender');  
        // create colume with float ( number , number)
        $table->float('price', 3, 2);
        //  foreign key
        $table->integer('id_type')->unsigned();
        // relationship foreign key
        $table->foreign('id_type')->references('id_type1')->on('TypeRoom');
    }); 
});

// foreign key 
Route::get('foreign',function(){
    Schema::create('TypeRoom',function($table){
        $table->increments('id_type1');
        $table->string('nametype');
        $table->boolean('checkvalue')->default(true);
    });
});

// edit tabel or colume
Route::get('edittable',function(){
    // edit or add or delete
    Schema::table('TypeRoom',function($table){
        // drop column in table 
         $table->dropColumn('name column');
        // add column in talbe
       $table->date('dateUser');
    });
    // rename table
    Schema::rename('TypeRoom','value name table');
});


// drop table
Route::get('droptable',function(){
    Schema::dropIfExists('room');
});

// query builder in laravel
Route::get('selectQuery',function(){
    $query= DB::table('room')->where('id','2')->get();
     // array json 
    echo($query."<br/>");
    // array object
    foreach($query as $object)
    {
        // call object.property
        if(Hash::check('long',$object->nameroom))
        {
            echo('true <br/>');
        }
        else if(Hash::check('long1',$object->nameroom))
        {
            echo('true1 <br/>');
        }
        else if(Hash::check('long2',$object->nameroom))
        {
            echo('true2 <br/>');
        }
       
        else if(Hash::check('long3',$object->nameroom))
        {
            echo('true3 <br/>');
        }
        else if(Hash::check('long4',$object->nameroom))
        {
            echo('true4 <br/>');
        }
        else if(Hash::check('long5',$object->nameroom))
        {
            echo('true5 <br/>');
        }
        else{
            echo('helo');
        }

    }

     // security for pass word
     // way1
     $hashPassword= bcrypt('long');
     // way2
     $hashPassword=Hash::make('long');

     if(Hash::check('long',$hashPassword))
     {
         echo('true ');
     }
     else{
         echo ('false');
     }
});

// inser = model
Route::get('ConntectModel',function(){
    // call contructor in class Room
    $room =  new App\room();
    // security nameroom
    $room->nameroom =bcrypt('ahihi');
    $room->value = 4;
    $room->gender=1;
    $room->id_type=1;
    // insert database in table room
    $room->save();
    //update data in table
    App\room::where('id','6')->update(['nameroom'=>'123','starttime'=>'23:32:32']);
    // get data in table
    $updateroom = App\room::where('id','6')->get();
    foreach ($updateroom as $val){
        echo $val->nameroom."<br/>".$val->starttime."<br/>";
    }
    // delete data in table
    // App\room::where('id','3')->delete();
    // query with model
    $type= App\TypeRoom::where('id_type1','2')->get();
    echo $type;

});
Route::get('home/',function(){
    return view('HomePage');
});

// test Resource (Restful webservice)
Route::get('viewTest',function(){
    return view('viewTestResource');
});
// get route use resource
Route::resource('showResouce','TestController');

// middleware = filter
Route::get('home1/',function(){
    return view('HomePage');
})->middleware('testMiddle');

// test use blade template
Route::get('testBlade',function(){
    return view('testBlade');
});


Route::get('createMultiKey',function(){
    // drop table id exists
    Schema::dropIfExists('account');
    //create table 
    Schema::create('account',function($table){
        $table->integer('id_acount');
        $table->integer('id');
        $table->integer('id_login');
        // multi primary key (key : integer)
        $table->primary(['id_login','id','id_acount']);
        $table->string('nameUser',100);
        $table->text('detail')->default('node');
        // create foreign key
        $table->integer('id_typeRoom')->unsigned();
        $table->foreign('id_typeRoom')->references('id_type1')->on('TypeRoom');

        $table->integer('id_room')->unsigned();
        $table->foreign('id_room')->references('id')->on('room');
    });
    echo 'create success';
});

//  view with ajax
Route::get("showAjax",'AjaxController@getquery');
// use with ajax
Route::get("showAjax1/{id}",'AjaxController@postquery');

// view html Excel
Route::get('viewEx','myController@ViewRoom');
// test common  maatwebsite 2.1.0 ( export)
Route::get('downloadExcel1',function(){
    // call common
    return Common::exportExcel();
})->name('downloadExcel1');
// test download by view blade maatwebsite 3.1 (export)
Route::get('downloadExcel',function(){
    return Common::downloadExcel();
})->name('downloadExcel');
// test download  phpoffice/phpspreadsheet (export)
Route::get('downloadExcel2',function(){
    return Common::downloadExcel1();
})->name('downloadExcel2');


// view form Import data
Route::get('viewForm',function(){
    return view('VIewImport');
});
// test import file by  maatwebsite 3.1
Route::post('importExcel','ControllerImport@importExcel')->name('import');
// test import file by  maatwebsite 2.1
Route::post('importExcel1','ControllerImport@importExcel1')->name('import1');
// test import file by  phpoffice/phpspreadsheet
Route::post('importExcel2','ControllerImport@importExcel2')->name('import2');
