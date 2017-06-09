<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Carbon\Carbon;
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','role_id','is_active','photo_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

// relationship for user and role
    public function role(){
        return $this->belongsTo('App\Role');
      }

      // relationship for user and photo
    public function photo(){
        return $this->belongsTo('App\Photo');
      }

      public function isadmin(){
         if ($this->role->name=='administrator') {
             # code...
            return true;
         }else{
            return false;
         }
      }



}
