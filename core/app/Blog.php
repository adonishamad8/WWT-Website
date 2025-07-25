<?php

namespace App;

use App;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\Models\Media;

class Blog extends Model implements HasMedia
{
	use HasMediaTrait;

	protected $table="blogs";
	protected $fillable = ['name', 'description', 'category', 'location', 'date', 'is_video', 'video_link', 'published'];
	protected $appends = ['tag_list', 'slug'];
		
	public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }
	
	public function getTagListAttribute()
    {
        $tags = $this->tags->pluck('name')->toArray();
        return implode("," , $tags);
    }
	
	public function registerMediaConversions(Media $media = null)
    {
		$this->addMediaConversion('thumb')
            ->crop('crop-center', 100, 100);
			
		$this->addMediaConversion('thumb-medium')
            ->crop('crop-center', 600, 400);
			
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
        return Str::limit( strip_tags($string), 190);
    }
	
	public function getSeoDescriptionAttribute()
    {
        $string = preg_replace('/\s+/mu', ' ', $this->description);
        $string = str_replace('&nbsp;', '', $string);
        return Str::limit( strip_tags($string), 250);
    }
}
