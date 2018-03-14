<?php namespace App\Models\CMS;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Category
 * Category model
 * @author Jagadeesh Battula jagadeesh@gmail.com
 *
 * @package App
 */
class Category extends Model
{
    /**
     * Fillable fields
     *
     * @var array
     */
    protected $fillable = ['name'];
}
