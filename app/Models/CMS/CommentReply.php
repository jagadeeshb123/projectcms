<?php namespace App\Models\CMS;

/**
 * Class CommentReply
 *
 * Comment Replies model
 *
 * @author Jagadeesh Battula jagadeesh@goftx.com
 * @package App
 */

use Illuminate\Database\Eloquent\Model;

class CommentReply extends Model
{
    /**
     * Fillable fields
     *
     * @var array
     */
    protected $fillable = [
        'comment_id',
        'author',
        'email',
        'body',
        'is_active'
    ];

    /**
     * Relationship mapping for CommentReply -> Comment
     *
     * @return mixed
     */
    public function comment()
        {

        return $this->belongTo('App\Models\CMS\Comment');
    }
}
