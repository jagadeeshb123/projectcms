<?php namespace App\Models\User;

/**
 * Class User
 *
 * User model
 *
 * @author Jagadeesh Battula jagadeesh@goftx.com
 * @package App
 */

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * Fillable fields
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',
        'is_active',
        'photo_id'
    ];
    /**
     * Hidden fields
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Relationship mapping for User -> Role
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function role()
    {
        return $this->belongsTo('App\Models\User\Role');
    }

    /**
     * Relationship mapping for User -> Photo
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function photo()
    {
        return $this->belongsTo('App\Models\CMS\Photo');
    }

    /**
     * Relationship mapping for User -> post
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function posts()
    {
        return $this->hasMany('App\Models\CMS\post');
    }

    /**
     * chech if logged in user is admin
     *
     * @return bool
     */
    public function isAdmin()
    {
        if($this->role->name == "Administrator" && $this->is_active == 1)
        {
            return true;
        }
        return false;
    }

    /**
     * check if logged in user is admin or author
     *
     * @return bool
     */
    public function isAuthor()
    {
        if($this->role->name == "Author" ||$this->role->name == "Administrator")
        {
            if($this->is_active == 1)
            {
                return true;
            }
        }
        return false;
    }

    /**
     * check if logged in user is admin or author or subscriber
     *
     * @return bool
     */
    public function isSubscriber()
    {
        if($this->role->name == "Subscriber" || $this->role->name == "Author" || $this->role->name == "Administrator")
        {
            if($this->is_active == 1)
            {
                return true;
            }
        }
        return false;
    }
}
