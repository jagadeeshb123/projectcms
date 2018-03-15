<?php namespace App\Models\CMS;

/**
 * Class Comment
 *
 *Comment model
 *
 * @author Jagadeesh Battula jagadeesh@gmail.com
 * @package App
 */

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    /**
     * Fillable fields
     *
     * @var array
     */
    protected $fillable = [
        'post_id',
        'author',
        'email',
        'body',
        'is_active'
    ];

    /**
     * Relationship Mapping for Comment -> CommentReply
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function replies(){

        return $this->hasMany('App\Models\CMS\CommentReply');
    }
}
