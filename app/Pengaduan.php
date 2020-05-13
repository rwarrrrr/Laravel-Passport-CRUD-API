<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    protected $table = 'pengaduan';
    protected $primaryKey = 'id';
    protected $fillable = [
    	'id','isi_laporan','foto'
    ];
}
