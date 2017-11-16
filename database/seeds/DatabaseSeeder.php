<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersSeeder::class);
        // factory(App\User::class, 5)->create()->each(function ($u) {
        // 	$u->laporan()->saveMany(factory(App\Laporan::class, 5)->make());
        // });
        // factory(App\Dospem::class, 2)->create();
        // factory(App\Pemlap::class, 2)->create();
        // factory(App\Instansi::class, 2)->create();
    }
}
