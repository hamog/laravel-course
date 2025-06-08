<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

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

//    protected $hidden = [
//        'title'
//    ];

    protected function title(): Attribute
    {
        return Attribute::make(
            get: fn (?string $value) => $value  ?: 'test title',
            set: fn (?string $value) => 'test'
        );
    }
}
