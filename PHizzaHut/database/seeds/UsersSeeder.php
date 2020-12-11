<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("users")->insert([
            [
                "roles" => "admin",
                "name" => "Admin",
                "email" => "admin@admin.com",
                "password" => Hash::make('admin'),
                "address" => "admin home",
                "phone" => "08123456789",
                "gender" => "Male"
            ],
            [
                "roles" => "guest",
                "name" => "Guest",
                "email" => "guest@guest.com",
                "password" => Hash::make('guest'),
                "address" => "guest",
                "phone" => "08123456780",
                "gender" => "Male"
            ]
        ]);
    }
}
