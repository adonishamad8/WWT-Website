<?php

namespace App;

use App;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\Models\Media;

class Mice extends Model implements HasMedia
{
    use HasMediaTrait;
	
	protected $table = "mices";
	protected $fillable = ['name', 'description', 'video_link', 'is_video', 'link', 'published'];

	
	public function registerMediaConversions(Media $media = null)
    {		
        $this->addMediaConversion('thumb')
			->crop('crop-center', 100, 100);
			
		$this->addMediaConversion('thumb-medium')
            ->crop('crop-center', 750, 500);
			
		$this->addMediaConversion('thumb-large')
            ->crop('crop-center', 1200, 800);
    }
}