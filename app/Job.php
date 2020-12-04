<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $fillable = 
    [
        'name', 'salary', 'descriptions','created_at','updated_at',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class)->withTimestamps()->withPivot('status','message');
    }
}
