<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;

    public function getPathAttribute()
    {
       $url = $this->album_thumb;
       if(stristr($this->album_thumb, 'http') === false){
           $url = 'storage/'.$url;
       }
       return $url;
    }

    // METODO 1 NEL CONTROLLER STORE
    // protected $fillable = [
    //     'album_name',
    //     'description',
    //     'user_id',
    //     'album_thumb'
    // ];

    public function photos()
    {
        return $this->hasMany(Photo::class);
    }
}
