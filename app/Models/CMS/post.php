<?php namespace App\Models\CMS;

/**
 * Class post
 *
 * Post model
 *
 * @author jagadeesh battula jagadeesh@goftx.com
 * @package App
 */

use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    /**
     * Fillable fields
     *
     * @var array
     */
    protected $fillable = [
        'category_id',
        'photo_id',
        'title',
        'body'
    ];

    /**
     * Relationship mapping for post -> User
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {

        return $this->belongsTo('App\Models\User\User');
    }

    /**
     * Relationship mapping for post -> Photo
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function photo()
    {

        return $this->belongsTo('App\Models\CMS\Photo');
    }

    /**
     * Relationship mapping for post -> Category
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {

        return $this->belongsTo('App\Models\CMS\Category');
    }

    /**
     * Relationship mapping for post -> Comment
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments()
    {

        return $this->hasMany('App\Models\CMS\Comment');
    }
}
