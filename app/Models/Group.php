<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;


    protected $fillable =[
        'group_name',
        'group_time',
        'group_date',
        'group_type',
        'group_image',
        'gym_id'
    ];


    public function gym()
    {
        return $this->belongsTo(Gym::class);
    }

    public function members()
    {
        return $this->belongsToMany(Member::class)->withTimestamps();
    }
}
