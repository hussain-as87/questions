<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SurveyResponse extends Model
{// protected $fillable=['question_id','answer_id','name','email'];
    use HasFactory;
    protected $guarded=[];
    public function survey()
    {
        return $this->belongsTo(Survey::class);
    }
}
