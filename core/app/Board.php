<?php

namespace App;

use App;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\Models\Media;

class Board extends Model implements HasMedia
{
    use HasMediaTrait; 

	protected $table = "boards";
	protected $fillable = ['name', 'description', 'position', 'email', 'phone', 'facebook', 'twitter', 'instagram', 'linkedin', 'order', 'published'];
	
	public function registerMediaConversions(Media $media = null)
    {
		$this->addMediaConversion('thumb')
            ->crop('crop-center', 100, 100);
			
		$this->addMediaConversion('thumb-large')
            ->crop('crop-center', 1000, 1000);
    }
}