<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'status_id',
        'company',
        'name',
        'tel',
        'email',
    ];
    
    public function getCompany ()
    {
        $txt =$this->company;
        return $txt;
    }
    use HasFactory;
}
