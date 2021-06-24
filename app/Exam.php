<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    protected $guarded=[];
    protected $table = "exams";
    protected $primaryKey = 'exam_id';

    public function getCareercat(){
        return $this->belongsTo(Careercat::class,'careercat_id','id');
    }
}
