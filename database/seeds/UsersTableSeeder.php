<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Apotekers;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Apotekers::create([
            'kodeApoteker'    => 'AP111',
            'nm_apoteker'    => 'Admin',
            'email'    => 'admin@mail.com',
            'tgl_lahir'    => '2021-10-10',
            'password'    => Hash::make('Test12345@')
        ]);
    }
}
