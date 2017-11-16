<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    // protected $dates = 'tgl_lahir';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'npm', 'nama', 'email', 'password', 'tgl_lahir', 'alamat', 'no_hp', 'dosen_pembimbing_id', 'pembimbing_lapangan_id', 'instansi_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function dospem()
    {
        return $this->belongsTo('App\Dospem', 'dosen_pembimbing_id');
    }

    public function pemlap()
    {
        return $this->belongsTo('App\Pemlap', 'pembimbing_lapangan_id');
    }

    public function instansi()
    {
        return $this->belongsTo('App\Instansi', 'instansi_id');
    }

    public function laporan()
    {
        return $this->hasMany('App\Laporan');
    }
}
