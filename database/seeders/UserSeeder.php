<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            [
                'name'              => 'Sylvester',
                'last_name'           => 'Stallone',
                'email'             => 'stallone@gmail.com',
                'phone'             => '+584247265819',
                'role_id'           => '1',
                'password'          => Hash::make('12345678'),
                'created_at'        => Carbon::now(),
                'email_verified_at' => Carbon::now(),
                'last_login'        => '2023-01-01 01:18:46',
            ], 
            [
                'name'              => 'Obi-Wan',
                'last_name'           => 'Kenobi',
                'email'             => 'kenobi@gmail.com',
                'phone'             => '+584247265811',
                'role_id'           => '2',
                'password'          => Hash::make('12345678'),
                'created_at'        => Carbon::now(),
                'email_verified_at' => Carbon::now(),
                'last_login'        => '2023-01-01 01:18:46',
            ],
            [
                'name'              => 'Homero',
                'last_name'           => 'Simpson',
                'email'             => 'simpson@gmail.com',
                'phone'             => '+584247265811',
                'role_id'           => '3',
                'password'          => Hash::make('12345678'),
                'created_at'        => Carbon::now(),
                'email_verified_at' => null,
                'last_login'        => Carbon::now(),
            ],
        ]);
    }
}
