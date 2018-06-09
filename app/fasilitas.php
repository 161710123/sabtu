<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class fasilitas extends Model
{
    protected $fillable = array('nama','keterangan','id_jurusan');
     public $timestamps =true;

         public function jurusan()
    {
    	return $this->belongsTo('App\jurusan','id_jurusan');
  }
}
