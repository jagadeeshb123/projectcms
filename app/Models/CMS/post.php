<?php namespace App\Models\CMS;

use Illuminate\Database\Eloquent\Model;

/**
 * Class post
 * post model
 * @author jagadeesh battula jagadeesh@goftx.com
 *
 * @package App
 */
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

    /**
     * Checking for updated fields and sending in assoc array
     *
     * @param $request
     * @param $photo
     * @return array
     */
    public static function updateValidation($request, $photo)
    {
        $data = [];
        if($request->title)
        {
            $data['title'] = $request->title;
        }
        if($request->body)
        {
            $data['body'] = $request->body;
        }
        if($request->category_id)
        {
            $data['category_id'] = $request->category_id;
        }
        if($photo != null)
        {
            $data['photo_id'] = $photo->id;
        }

        return $data;
    }
}
