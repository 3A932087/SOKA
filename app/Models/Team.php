<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;
    protected $fillable=[
        'id',
        'name',
        'team_call',
    ];
    public $timestamps = false;//不用儲存建立時間及修改時間
}
