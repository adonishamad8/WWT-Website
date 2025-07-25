<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model 
{
    protected $table="tags";
	protected $fillable = ['name'];

    public $timestamps = false;
 
	public function event() 
    {
        return $this->belongsToMany('App\Event');
    }
	
	public function package() 
    {
        return $this->belongsToMany('App\Package');
    }
}
  