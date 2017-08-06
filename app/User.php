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



      /**
       * User belongs to Role.
       *
       * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
       */
      public function role()
      {
        // belongsTo(RelatedModel, foreignKey = role_id, keyOnRelatedModel = id)
        return $this->belongsTo(Role::class);
      }

  

/**
 * User belongs to Photo.
 *
 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
 */
public function photo()
{
  // belongsTo(RelatedModel, foreignKey = photo_id, keyOnRelatedModel = id)
  return $this->belongsTo(Photo::class);
}



    /**
     * User has many Posts.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function posts()
    {
        // hasMany(RelatedModel, foreignKeyOnRelatedModel = user_id, localKey = id)
        return $this->hasMany('App\Post');
    }


  /**
     * check the user status is active or not.
     *
     * @return true or false
     */
      public function isactive(){

         if ($this->is_active==1) {
             # code...
            return true;
         }else{
            return false;
         }
      }

      /**
     * check the user role is admin or not .
     *
     * @return true or false
     */

      public function isadmin(){
           if ($this->role) {
               # code...
              if ($this->role->name=='admin') {
             # code...
            return true;
         }else{
            return false;
         }
           }
           return false;
       
      }

        /**
     * check the user role is author or not .
     *
     * @return true or false
     */

           public function isauthor(){
             if ($this->role) {
               # code...
                  if ($this->role->name=='author') {
             # code...
            return true;
         }else{
            return false;
         }
           }
           return false;
       
      }

        /**
     * check the user role is subscriber or not .
     *
     * @return true or false
     */

      public function issubscriber(){
         if ($this->role) {
               # code...
               if ($this->role->name=='subscriber') {
             # code...
            return true;
         }else{
            return false;
         }
           }
           return false;
      
      }



}
