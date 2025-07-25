<?php

namespace App;

use App;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\Models\Media;

class Slider extends Model implements HasMedia
{
	use HasMediaTrait;

	protected $table="sliders";
	protected $fillable = ['name', 'description', 'category', 'link', 'order', 'published'];
	
	public function registerMediaConversions(Media $media = null)
    {
		$this->addMediaConversion('thumb')
            ->crop('crop-center', 100, 100);
			 
		$this->addMediaConversion('thumb-large')
            ->crop('crop-center', 1800, 1000);
    }
}
