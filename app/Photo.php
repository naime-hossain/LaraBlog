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
    protected $directory='/images/';
    protected $thunb_directory='/images/thumbnails/';
    // public function getImageAttribute($image){
    //  return $this->directory.$image;
    // }

   
 public function thumb(){
     return $this->thunb_directory.$this->image;
    }
     public function image(){
     return $this->directory.$this->image;
    }
    
}
