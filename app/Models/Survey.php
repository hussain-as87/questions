<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    use HasFactory;
    //protected $fillable=['question_id','answer_id','name','email'];
    protected $guarded=[];
    public function responses()
    {
        return $this->hasMany(SurveyResponse::class);
    }
    public function questionnaire()
    {
        return $this->belongsTo(Questionnaire::class);
    }
}
