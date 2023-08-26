<?php

namespace Kdcwinner\Securitycode\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Securitycode extends Model
{
    protected $guarded = [];

    public function getTable()
    {
        return config('securitycode.table_name');
    }

    public static function getRandomRow()
    {
        return self::inRandomOrder()->first();
    }

    public static function getRandomData()
    {
        return self::getRandomRow()->data;
    }

    public function insertData(){
        $data = array('code_length'=>6);
        $data = json_encode($data);
        DB::table(config('securitycode.table_name'))->insert([
                'data' => $data
            ]);
    }
    
}
