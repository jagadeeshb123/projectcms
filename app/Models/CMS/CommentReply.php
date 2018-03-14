<?php namespace App\Models\CMS;

use Illuminate\Database\Eloquent\Model;

/**
 * Class CommentReply
 * Comment Replies model
 * @author Jagadeesh Battula jagadeesh@goftx.com
 *
 * @package App
 */
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
