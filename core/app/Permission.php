<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    /**
     * The attributes that are mass assignable. 
     *
     * @var array
     */
    protected $fillable = ['name', 'identifier'];

    /**
     * User relation.
     * 
     * @return type
     */
    public function users() 
    {
        return $this->belongsToMany('App\User');
    }
}
