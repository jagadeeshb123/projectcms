<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $fillable = ['file'];

    protected $uploads = '/images/';

    public function getFileAttribute($photo){

        return $this->uploads . $photo;
    }

    //adding photo to '/Public/images' folder and storing path and photo_id in table
    public static function addPhotoToPublic($request){

        $input = $request->all();
        if($file = $request->file(['photo_id'])){
            $name  = time(). $file->getClientOriginalName();
            $file->move('images', $name);
            $photo = Photo::create(['file'=>$name]);
            $input['photo_id'] = $photo->id;
        }

        return $photo;
    }
}


