<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class guru extends Model
{
         protected $fillable = array('foto','nama','mapel');
     public $timestamps =true;
}

