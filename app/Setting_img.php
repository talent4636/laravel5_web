<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting_img extends Model
{
    public $table = 'setting_img';

    protected $fillable = ['mark', 'path'];
}
