<?php

namespace Database\Seeders;
use App\Models\Fraction;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FractionSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Fraction::truncate();//重制資料表
        //factory
        Fraction::factory([
            'user_id' => 1,
            'team_id' => 1,
            'fraction' =>0,
        ])->create();
        Fraction::factory([
            'user_id' => 1,
            'team_id' => 2,
            'fraction' =>0,
        ])->create();
        Fraction::factory([
            'user_id' => 1,
            'team_id' => 3,
            'fraction' =>0,
        ])->create();
        Fraction::factory([
            'user_id' => 1,
            'team_id' => 4,
            'fraction' =>0,
        ])->create();

    }
}
