<?php

namespace App;

use App;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\Models\Media;
 
class Review extends Model implements HasMedia
{
    use HasMediaTrait;
	
	protected $table = "reviews";
	protected $fillable = ['name', 'description', 'position', 'order', 'published'];
	protected $appends = ['slug'];


	public function registerMediaConversions(Media $media = null)
    {
		$this->addMediaConversion('thumb')
            ->crop('crop-center', 100, 100);
			
		$this->addMediaConversion('thumb-medium')
            ->crop('crop-center', 500, 500);
    }
}