<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Questions extends Model
{
    public $table = 'questions';
    protected $fillable = ['id','language_type','score','content','answer','question_type'];
}
