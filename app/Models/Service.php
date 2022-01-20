<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Service extends Model implements HasMedia
{
    use InteractsWithMedia;
    protected $fillable = [
        'title', 'desc', 'img','icon',
    ];
    public function registerMediaCollections(): void
{
    $this->addMediaCollection('service');
 
} 
    // public static function last()
    // {
    //     return static::all()->last;
    // }
}
