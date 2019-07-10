<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detail_user extends Model
{
    //
    public function users()
    {
        return hasOne(User::class);
    }
}
