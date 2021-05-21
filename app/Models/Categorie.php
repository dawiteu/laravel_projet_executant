<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    use HasFactory;

    public function images(){
        return $this->hasMany(Image::class, 'cat_id');
    }

    public function firstimg(){ 
        return $this->hasOne('App\Models\Image', 'cat_id')->oldest(); 
    }

}
