<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    /**
     * Fields that can be mass assigned.
     *
     * @var array
     */
    protected $fillable = [
     'title',
     'body',
     'category_id',
     'photo_id',
     'user_id'
    ];

    /**
     * Post belongs to Users.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
    	// belongsTo(RelatedModel, foreignKey = users_id, keyOnRelatedModel = id)
    	return $this->belongsTo('App\User');
    }

    /**
     * Post belongs to Photo.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function photo()
    {
    	// belongsTo(RelatedModel, foreignKey = photo_id, keyOnRelatedModel = id)
    	return $this->belongsTo('App\Photo');
    }

    /**
     * Post belongs to Category.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
    	// belongsTo(RelatedModel, foreignKey = category_id, keyOnRelatedModel = id)
    	return $this->belongsTo('App\Category');
    }

    /**
     * Post has many Comments.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments()
    {
        // hasMany(RelatedModel, foreignKeyOnRelatedModel = post_id, localKey = id)
        return $this->hasMany('App\Comment');
    }
}
