<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //run insert
        $this->call(InsertTypeRoomSeeder::class);
        $this->call(InsertTypeRoom::class);
        $this->call(InsertAccount::class);
    }
}

class InsertTypeRoomSeeder extends Seeder{
    
    public function run(){
        // insert database 
        DB::table('TypeRoom')->insert([
            // bcript : security in database
            ['nametype'=>bcrypt('long'),'checkvalue'=>'1','dateUser'=>'2012-02-12'],
            ['nametype'=>'long','checkvalue'=>'1','dateUser'=>'2012-12-12'],
            ['nametype'=>'long1','checkvalue'=>'0','dateUser'=>'2012-11-12'],
            ['nametype'=>'long2','checkvalue'=>'1','dateUser'=>'2012-10-12'],
        ]);
    }
}
class InsertTypeRoom extends Seeder{
    
    public function run(){
        // insert database 
        DB::table('room')->insert([
            // bcript : security in database
            ['nameroom'=>bcrypt('long1'),'gender'=>'1','id_type'=>'2'],
            ['nameroom'=>bcrypt('long2'),'gender'=>'1','id_type'=>'1'],
            ['nameroom'=>bcrypt('long3'),'gender'=>'1','id_type'=>'3'],
            ['nameroom'=>bcrypt('long4'),'gender'=>'1','id_type'=>'1'],
        ]);
    }
}
    class InsertAccount extends Seeder{
        public function run(){
            DB::table('account')->insert(
                [
                    ['id_acount'=>1,'id'=>5,'id_login'=>1,'nameUser'=>'long','id_typeRoom'=>'1','id_room'=>'1','detail'=>'12'],
                    ['id_acount'=>1,'id'=>2,'id_login'=>1,'nameUser'=>'long','id_typeRoom'=>'1','id_room'=>'1','detail'=>'12'],
                    ['id_acount'=>1,'id'=>3,'id_login'=>1,'nameUser'=>'long','id_typeRoom'=>'1','id_room'=>'1','detail'=>'12'],
                    ['id_acount'=>1,'id'=>4,'id_login'=>1,'nameUser'=>'long','id_typeRoom'=>'1','id_room'=>'1','detail'=>'12'],
                ]
            );
        }
    }
