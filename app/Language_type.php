<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Language_type extends Model
{
    public $table = 'language_type';
    protected $fillable = ['id','name','parent_id','desc'];
}
