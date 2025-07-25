<?php

namespace App;

use App;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\Models\Media;

class About extends Model implements HasMedia
{
    use HasMediaTrait;
  
	protected $table = "abouts";
	protected $fillable = ['name', 'description', 'type', 'link', 'published'];
	
	
	public function registerMediaConversions(Media $media = null)
    {
		$this->addMediaConversion('thumb')
            ->crop('crop-center', 100, 100);
			
		$this->addMediaConversion('thumb-medium')
            ->crop('crop-center', 750, 500);
			
		$this->addMediaConversion('thumb-large')
            ->crop('crop-center', 1200, 800);
    }
	
	public function getShortDescriptionAttribute()
    {
        $string = preg_replace('/\s+/mu', ' ', $this->description);
        $string = str_replace('&nbsp;', '', $string);
        return Str::limit( strip_tags($string), 600);
    }
}