<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $guarded = [];
    protected $table = "master_cities";

    public function province()
    {
        return $this->belongsTo(Province::class, "master_province_id");
    }

    // public function order()
    // {
    //     return $this->hasOne("App\Model\Order");
    // }
}
