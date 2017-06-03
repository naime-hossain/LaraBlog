<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    //

  /**
     * Fields that can be mass assigned.
     *
     * @var array
     */
    protected $fillable = ['image'];
    protected $directory='images/';
    public function getImageAttribute($image){
     return $this->directory.$image;
    }
}
