<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //protected $table = 'dastebandi';

    //public $timestamps = false;

    //protected $connection = 'sqlsrv';

//    protected $attributes = [
//        'status' => true,
//    ];

    protected $fillable = [
        'name',
        'status'
    ];

}
