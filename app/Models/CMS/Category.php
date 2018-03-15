<?php namespace App\Models\CMS;

/**
 * Class Category
 *
 * Category model
 *
 * @author Jagadeesh Battula jagadeesh@gmail.com
 * @package App
 */

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * Fillable fields
     *
     * @var array
     */
    protected $fillable = ['name'];
}
