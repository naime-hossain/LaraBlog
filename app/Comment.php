<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
class Comment extends Model
{
    //
    /**
     * Fields that can be mass assigned.
     *
     * @var array
     */
    protected $fillable = [
							 'body',
							'user_id',
							'post_id'

						];

/**
 * Comment belongs to Post.
 *
 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
 */
public function post()
{
	// belongsTo(RelatedModel, foreignKey = post_id, keyOnRelatedModel = id)
	return $this->belongsTo('App\Post');
}

/**
 * Comment belongs to User.
 *
 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
 */
public function user()
{
	// belongsTo(RelatedModel, foreignKey = user_id, keyOnRelatedModel = id)
	return $this->belongsTo('App\User');
}



}
