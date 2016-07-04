<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    public $table = 'content';

    protected $fillable = ['title','content','published_time','disabled'];
}
