<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class data_sheet extends Model
{
    //
    public function pdf_contents()
    {
        return $this->hasOne('App\pdf_content');
    }
}
