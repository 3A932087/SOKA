<?php

namespace Database\Seeders;
use App\Models\Team;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TeamSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Team::truncate();//重制資料表
        Team::factory([
            'name' => '超級瑪莉歐',
            "team_call"=>'test',
        ])->create();
        Team::factory([
            'name' => '咒術迴戰 領域展開',
            "team_call"=>'test',
        ])->create();
        Team::factory([
            'name' => '無所畏懼小小兵',
            "team_call"=>'test',
        ])->create();
        Team::factory([
            'name' => '名偵探柯南',
            "team_call"=>'test',
        ])->create();
    }
}
