<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class SportsClubUsers extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'firstname' => 'asd',
            'lastname' => 'asd',
            'phonenumber' => '5646546',
            'age' => '45',
            'email' => '123@sportsclub.com',
            'password' => Hash::make('777'),
            'address1' => 'chenab nagar',
            'address2' => 'wasti',
            'city' => 'lahore',
            'country' => 'Pakistan',
            'state' => 'Punjab',
            'zip' => '35460',
        ]);
    }
}
