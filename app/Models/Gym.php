<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gym extends Model
{
    use HasFactory;

    protected $fillable = [

        'name',
        'phone_no',
        'address',
        'email'

    ];

    public function groups()
    {
        return $this->hasMany(Group::class);
    }




}


