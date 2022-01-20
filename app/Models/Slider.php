<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Slider extends Model implements HasMedia
{
    use InteractsWithMedia;
    public $fillable = [
        'img',
    ];
    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('slider');
    }

    // public function registerMediaCollections(): void
    // {
    //     $this->addMediaCollection('slider_image');
    // }
}
