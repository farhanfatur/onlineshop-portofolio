<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    protected $guarded = [];
    protected $table = "master_provinces";

    public function city()
    {
        return $this->hasMany("App\Model\City");
    }

    // public function order()
    // {
    //     return $this->hasOne("App\Model\Order");
    // }
}
