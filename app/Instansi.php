<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Instansi extends Model
{
    protected $table = 'instansi';

    protected $fillable = [
    	'nama', 'alamat', 'no_tlp',
    ];

    public function mahasiswa()
    {
        return $this->hasMany('App\User', 'instansi_id');
    }
}
