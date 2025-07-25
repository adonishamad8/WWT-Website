<?php

namespace App;

use App;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\Models\Media;
 
class Category extends Model implements HasMedia
{
    use HasMediaTrait;
	
	protected $table = "categories";
	protected $fillable = ['name', 'description', 'order', 'published'];
	protected $appends = ['slug'];


	public function packages()
    {
        return $this->belongsToMany('App\Package')->orderBy('id', 'DESC')->where('published', '1');
    }
	
	/**
     * Slug Attribute
     * @return [type] [description]
     */
    public function getSlugAttribute()
    {
		return Str::slug($this->name);
    }
	
	public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb')
            ->crop('crop-center', 100, 100);
			
		$this->addMediaConversion('thumb-large')
            ->crop('crop-center', 1000, 1000);
    }
}