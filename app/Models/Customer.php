<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'company',
        'name',
        'tel',
        'email',
    ];
    
    use HasFactory;
}
