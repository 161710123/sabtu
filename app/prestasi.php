<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class prestasi extends Model
{
    protected $fillable = array('nama','keterangan','id_eskul','id_jurusan');
    public $timestamps = true;

    public function eskul()
    {
    	return $this->belongsTo('App\eskul','id_eskul');
    }
    public function jurusan()
    {
    	return $this->belongsTo('App\jurusan','id_jurusan');
    }
}
