<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Lawer extends Model implements HasMedia
{
    
    use InteractsWithMedia;
    protected $fillable = [
        'title', 'desc', 'img',];
        public function registerMediaCollections(): void
        {
            $this->addMediaCollection('lawer');
         
        }
}
