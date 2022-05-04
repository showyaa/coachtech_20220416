<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewStatus extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'status1',
        'status2',
        'status3',
        'status4',
        'status5',
    ];
}
