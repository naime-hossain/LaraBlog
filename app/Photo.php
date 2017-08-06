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

   //function for getting the thumbnails
 public function thumb(){
     return $this->thunb_directory.$this->image;
    }

    // function for getting the cover image
     public function image(){
     return $this->directory.$this->image;
    }
    
}
