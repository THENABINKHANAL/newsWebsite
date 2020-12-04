<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class project_user extends Model
{
    protected $fillable = [
        'post_id' , 'user_id' ,
    ];

}
