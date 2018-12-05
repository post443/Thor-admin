<?php

namespace App\Models\HHWQZZL;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $table = 'hhwqzzl_questions';
    protected $fillable = ['title','value'];
}
