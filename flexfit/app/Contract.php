<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    //
    protected $table = 'contract';

    protected static function getListContract()
    {
        $data = self::select('id','contract_code')->get();
        $contracs = Array();
        foreach ($data as $value)
        {
            $contracs[$value->id] = $value->contract_code;
        }
        return $contracs;
    }
}
