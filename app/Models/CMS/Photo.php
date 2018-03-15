<?php namespace App\Models\CMS;

/**
 * Class Photo
 *
 * Photo model
 *
 * @author Jagadeesh Battula jagadeesh@goftx.com
 * @package App
 */

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    /**
     * Fillable fields
     *
     * @var array
     */
    protected $fillable = ['file'];

    /**
     * Storing images location in variable
     *
     * @var string
     */
    protected $uploads = '/images/';

    /**
     * @param $photo
     * @return string
     */
    public function getFileAttribute($photo)
    {
        return $this->uploads . $photo;
    }

    /**
     * Adding photo to '/Public/images' folder and storing path and photo_id in database
     *
     * @param $request
     * @return static
     */
    public static function addPhotoToPublic($request)
    {
        $input = $request->all();

        if($file = $request->file(['photo_id']))
        {
            $name               = time(). $file->getClientOriginalName();
            $file->move('images', $name);
            $photo              = Photo::create(['file'=>$name]);
            $input['photo_id']  = $photo->id;

            return $photo;
        }

        return null;
    }
}
