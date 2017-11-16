<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    protected $guarded = [];
    protected $table = 'laporan_kegiatan';
    protected $fillable = [
    	'user_id', 'judul', 'deskripsi', 'foto', 'verified_by_dp', 'verified_by_pl',
    ];

    public function mahasiswa()
    {
        return $this->belongsTo('App\User');
    }
}
