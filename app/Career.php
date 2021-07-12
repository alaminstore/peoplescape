<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Career extends Model
{
    protected $table = 'careers';
    public function getCat(){
        return $this->belongsTo(Career::class,'catid','id');
    }

    protected $rules = [
        'short_code' => 'sometimes|required|unique:careers',
    ];
}
