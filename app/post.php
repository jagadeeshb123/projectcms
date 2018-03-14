<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class post extends Model
{
    protected $fillable = [
        'category_id', 'photo_id', 'title', 'body'
    ];

    public function user(){

        return $this->belongsTo('App\User');
    }

    public function photo(){

        return $this->belongsTo('App\Photo');
    }

    public function category(){

        return $this->belongsTo('App\Category');
    }

    public function comments(){

        return $this->hasMany('App\Comment');
    }

    //checking for updated feilds and sending in assoc array
    public static function updateValidation($request, $photo){

        $data = [];
        if($request->title)
            $data['title'] = $request->title;
        if($request->body)
            $data['body'] = $request->body;
        if($request->category_id)
            $data['category_id'] = $request->category_id;
        if($photo != null)
            $data['photo_id'] = $photo->id;

        return $data;
    }
}
