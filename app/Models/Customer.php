<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'statuse_id',
        'company',
        'name',
        'tel',
        'email',
    ];
    
    use HasFactory;
}
