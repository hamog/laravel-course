<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

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
        'title',
        'status',
    ];

//    protected $hidden = [
//        'title'
//    ];

    protected static function booted()
    {
        static::saved(function () {
            static::clearAllCaches();
        });
        static::deleted(function () {
            static::clearAllCaches();
        });
    }

    public static function clearAllCaches()
    {
        if (Cache::has('categories')) {
            Cache::forget('categories');
        }
    }

    protected function title(): Attribute
    {
        return Attribute::make(
            get: fn (?string $value) => $value  ?: 'test title',
            set: fn (?string $value) => 'test'
        );
    }
}
