<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;

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
