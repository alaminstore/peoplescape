<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    protected $guarded=[];
    protected $table = "exams";
    protected $primaryKey = 'exam_id';

    public function getCareerCat(){
        return $this->belongsTo(Careercat::class,'careercat_id','id');
    }
    public function getCareer(){
        return $this->belongsTo(Career::class,'job_id','id');
    }
}
