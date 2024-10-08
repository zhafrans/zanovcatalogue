<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $now = Carbon::now();
        DB::table('users')->insert([
            'username' => 'zanov',
            'role' => 'admin',
            'password' => Hash::make('admin@123'),
            'created_at' => $now,
            'updated_at' => $now,
        ]);
    }
}
