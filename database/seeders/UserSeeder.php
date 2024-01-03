<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;



class UserSeeder extends Seeder
{
    public function run(): void
    {
       $data = [
            ['name'      => 'admin',
            'email'     => 'admin@gmail.com',
            'password'  => Hash::make('admin'),
            'role'      => 'admin',],
            ['name'      => 'kasir',
            'email'     => 'kasir@gmail.com',
            'password'  => Hash::make('kasir'),
            'role'      => 'kasir',],
        ];
        User::insert($data);
    }
}
