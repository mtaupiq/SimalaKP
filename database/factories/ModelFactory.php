<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */

$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
    	'npm' => $faker->randomNumber(9),
        'nama' => $faker->firstName.' '.$faker->lastName,
        'email' => $faker->unique()->userName.'@student.unsil.ac.id',
        'password' => $password ?: $password = bcrypt('123456'),
        'tgl_lahir' => $faker->date,
        'alamat' => $faker->address,
        'no_hp' => '+6281-'.$faker->randomNumber(4).'-'.$faker->randomNumber(4),
        'dosen_pembimbing_id' => $faker->numberBetween(1,2),
        'pembimbing_lapangan_id' => $faker->numberBetween(1,2),
        'instansi_id' => $faker->numberBetween(1,2),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Dospem::class, function (Faker\Generator $faker) {
    static $password;

    return [
    	'nidn' => $faker->randomNumber(9),
        'nama' => $faker->name,
        'email' => $faker->unique()->userName.'@unsil.ac.id',
        'password' => $password ?: $password = bcrypt('123456'),
        'no_hp' => '+6281-'.$faker->randomNumber(4).'-'.$faker->randomNumber(4),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Pemlap::class, function (Faker\Generator $faker) {
    static $password;

    return [
    	'nip' => $faker->randomNumber(9),
        'nama' => $faker->name,
        'email' => $faker->unique()->companyEmail,
        'password' => $password ?: $password = bcrypt('123456'),
        'jabatan' => $faker->jobTitle,
        'no_hp' => '+6281-'.$faker->randomNumber(4).'-'.$faker->randomNumber(4),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Instansi::class, function (Faker\Generator $faker) {
    return [
        'nama' => $faker->company,
        'alamat' => $faker->address,
        'no_tlp' => '(0264) '.$faker->randomNumber(6),
    ];
});

$factory->define(App\Laporan::class, function (Faker\Generator $faker) {
    return [
        'judul' => $faker->sentence(6),
        'deskripsi' => $faker->paragraph,
        'foto' => 'https://dashboard.simalakp.dev/foto/foto.jpg',
        'verified_by_pl' => 0,
        'verified_by_dp' => 0,
    ];
});