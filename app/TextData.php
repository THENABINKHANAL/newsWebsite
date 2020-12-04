<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TextData extends Model
{
    protected $fillable = [
        'id' , 'text' , 'imgloc' , 'Name' , 'Post' ,
    ];
    protected $table ='textdata';
    public $primaryKey='id';
}
