<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class berita extends Model
{
     protected $fillable = array('judul','isi');
     public $timestamps =true;
}
