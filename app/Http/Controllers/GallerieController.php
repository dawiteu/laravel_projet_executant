<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categorie;
use App\Models\Image;

class GallerieController extends Controller
{
    public function index(){
        $cats = Categorie::paginate(7);

        return view('admin.gallerie.index', compact('cats'));

    }

    public function show($id){
        $gallerie = Categorie::where('id', $id)->first(); 
        $imgs = Image::where('cat_id', $id)->paginate(1); 
        return view('admin.gallerie.show', compact('gallerie', 'imgs')); 
    }
}
