<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::truncate();//重制資料表
        User::factory([ //平台人員
            'type'=> 0,//身分編號
            'name' => 'admin',//姓名
            'email' => 'admin@gmail.com',//電子郵件
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        ])->create();

        User::factory([ //熱力部
            'type'=> 1,//身分編號
            'name' => '熱力部',//姓名
            'email' => 'energy@gmail.com',//電子郵件
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        ])->create();

        User::factory([ //活動部
            'type'=> 2,//身分編號
            'name' => '活動部',//姓名
            'email' => 'activity@gmail.com',//電子郵件
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        ])->create();
    }
}
