<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class vacancy extends Model
{
    //
    protected $fillable = [
        'Title', 'Requirements', 'Responsibilities' ,
    ];
}
