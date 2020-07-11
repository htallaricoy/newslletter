<?php

namespace Database\Seeds;

use Illuminate\Database\Seeder;
use App\Models\Account;
use Illuminate\Support\Facades\Hash;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                "id" => 1,
                "user" => "PAPA",
                "department" => "代表取締役",
                "password" => Hash::make("ThinkHappy01")
            ],
            [
                "id" => 2,
                "user" => "KANRI",
                "department" => "管理本部",
                "password" => Hash::make("ThinkHappy02")
            ],
            [
                "id" => 3,
                "user" => "SALES",
                "department" => "営業部",
                "password" => Hash::make("ThinkHappy03")
            ],
            [
                "id" => 4,
                "user" => "IT",
                "department" => "IT事業部",
                "password" => Hash::make("ThinkHappy04")
            ],
            [
                "id" => 5,
                "user" => "SES",
                "department" => "SES事業部",
                "password" => Hash::make("ThinkHappy05")
            ],
            [
                "id" => 6,
                "user" => "GENERAL",
                "department" => "一般社員",
                "password" => Hash::make("thk")
            ],
        ];

        Account::insert($users);

    }
}
