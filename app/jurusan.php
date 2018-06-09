<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class jurusan extends Model
{
    protected $fillable = array('nama','keterangan');
     public $timestamps =true;

         public function fasilitas()
    {
    	return $this->hasMany('App\fasilitas','id_jurusan');
    }
     	public function industri()
    {
    	return $this->hasMany('App\industri','id_jurusan');
    }
    	public function prestasi()
    {
    	return $this->hasMany('App\prestasi','id_jurusan');
    }
}
