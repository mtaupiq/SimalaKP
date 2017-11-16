<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new App\Admin;
        $admin->name = 'Muhammad Taupiq';
        $admin->email = 'mtaupiq@gmail.com';
        $admin->password = bcrypt('123456');
        $admin->save();

        $dospem = new App\Dospem;
        $dospem->nidn = '1111111111';
        $dospem->nama = 'Dosen Pembimbing 1';
        $dospem->email = 'dospem1@gmail.com';
        $dospem->password = bcrypt('123456');
        $dospem->no_hp = '081220371641';
        $dospem->save();

        $pemlap = new App\Pemlap;
        $pemlap->nip = '9999999999';
        $pemlap->nama = 'Pembimbing Lapangan 1';
        $pemlap->email = 'pemlap1@gmail.com';
        $pemlap->password = bcrypt('123456');
        $pemlap->jabatan = 'Staff';
        $pemlap->no_hp = '081220371641';
        $pemlap->save();

        $instansi = new App\Instansi;
        $instansi->nama = 'PT. Sofwerhos';
        $instansi->alamat = 'Tasikmalaya';
        $instansi->no_tlp = '(0265)123456';
        $instansi->save();

        $mhs = new App\User;
        $mhs->npm = '137006280';
        $mhs->nama = 'Muhammad Taupiq';
        $mhs->email = '137006280@student.unsil.ac.id';
        $mhs->password = bcrypt('03091994');
        $mhs->tgl_lahir = '1994-09-03';
        $mhs->alamat = 'Mangkubumi';
        $mhs->no_hp = '081220371641';
        $mhs->dosen_pembimbing_id = $dospem->id;
        $mhs->pembimbing_lapangan_id = $pemlap->id;
        $mhs->instansi_id = $instansi->id;
        $mhs->save();

    }
}
