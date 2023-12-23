<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AchievementEmployee extends Model
{
    use HasFactory;

    protected $table = 'achievement_employee';

    protected $fillable = [
        'achievement_id',
        'employee_id ',
    ];
}
