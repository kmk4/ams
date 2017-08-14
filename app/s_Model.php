<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class s_model extends Model
{
    public function regionId(){
    return $this->belongsTo(Region::class ,'region_id');
}
}
