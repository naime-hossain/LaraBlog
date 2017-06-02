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
}
