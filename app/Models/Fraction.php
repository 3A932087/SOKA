<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Team;
use App\Models\User;

class Fraction extends Model
{
    use HasFactory;
    protected $fillable=[
        'id',
        'team_id',
        'user_id',
        'fraction',
        ''
    ];
    public $timestamps = false;//不用儲存建立時間及修改時間
    
    public function team(){
        return $this->belongsTo(Team::class);
    }
}
