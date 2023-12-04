<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gym extends Model
{
    use HasFactory;

    public function groups()
    {
        return $this->hasMany(Group::class);
    }

    public function gym()
    {
        return $this->belongsTo(Gym::class);
    }


}


