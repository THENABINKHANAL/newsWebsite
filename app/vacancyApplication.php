<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class vacancyApplication extends Model
{
    //
    protected $fillable = [
        'VacancyTitle', 'name', 'email' , 'contactno', 'CVlocation',
    ];
}
