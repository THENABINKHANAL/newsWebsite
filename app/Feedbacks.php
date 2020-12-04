<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feedbacks extends Model
{
    protected $fillable = [
            'id' , 'feedbackName' , 'feedbackContact' , 'feedbackMsg' , 'feedbackForm' ,
    ];
}
