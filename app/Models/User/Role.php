<?php namespace App\Models\User;

/**
 * Class Role
 *
 * Role model
 *
 * @author Jagadeesh Battula jagadeesh@goftx.com
 * @package App
 */

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    /**
     * Fillable feilds
     *
     * @var array
     */
    protected $fillable = ['name'];
}
