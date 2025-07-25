<?php

namespace App;

use App;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\Models\Media;

class Service extends Model implements HasMedia
{
    use HasMediaTrait;
	
	protected $table = "services";
	protected $fillable = ['name', 'description', 'icon', 'link', 'order', 'published'];
	protected $appends = ['slug'];

	
	public function registerMediaConversions(Media $media = null)
    {
		$this->addMediaConversion('thumb')
            ->crop('crop-center', 100, 100);
			
		$this->addMediaConversion('thumb-medium')
            ->crop('crop-center', 750, 500);
			
		$this->addMediaConversion('thumb-large')
            ->crop('crop-center', 1200, 800);
    }
	
	/**
     * Slug Attribute
     * @return [type] [description]
     */
    public function getSlugAttribute()
    {
		return Str::slug($this->name);
    }
	
	public function getShortDescriptionAttribute()
    {
        $string = preg_replace('/\s+/mu', ' ', $this->description);
        $string = str_replace('&nbsp;', '', $string);
        return Str::limit( strip_tags($string), 75);
    }
	
	public function getSeoDescriptionAttribute()
    {
        $string = preg_replace('/\s+/mu', ' ', $this->description);
        $string = str_replace('&nbsp;', '', $string);
        return Str::limit( strip_tags($string), 250);
    }
}