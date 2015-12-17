<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class engine extends Model
{
    //
    public function data_sheets()
    {
        return $this->hasMany('App\data_sheet');
    }
}
