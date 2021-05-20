<?php

namespace App\Http\Controllers;

use App\Http\Requests\AvatarRequest;
use App\Models\Avatar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AvatarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $avs = Avatar::paginate(5); 

        return view('admin.avatar.index', compact('avs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $avatars = Avatar::all()->where('prov', 'admin'); 

        if(count($avatars) < 5){
            return view('admin.avatar.add', compact('avatars'));
        }else{
            return redirect()->route('avatar.index')->with('error', 'Impossible d4ajouter plus de 5 avatars'); 
        }
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AvatarRequest $request)
    {
        $av = new Avatar(); 
        
        $av->nom = $request->nom; 
        if ($request->file('img') != NULL) {
            $request->file('img')->storePublicly('img/avs/','public');
            $av->name = $request->file('img')->hashName();
        }
        $av->prov = 'admin'; 
        $av->save(); 

        //DB::insert('insert into avatarsrel (uploader_id, avatar_id) values ('.Auth::user()->id.','.$av->id.')', [1, 'Dayle']);

        return redirect()->route('avatar.index')->with('success', 'Avatar bien enregistré!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Avatar  $avatar
     * @return \Illuminate\Http\Response
     */
    public function show(Avatar $avatar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Avatar  $avatar
     * @return \Illuminate\Http\Response
     */
    public function edit(Avatar $avatar)
    {
        return view('admin.avatar.edit', compact('avatar')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Avatar  $avatar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Avatar $avatar)
    {
        $request->validate([
            "nom" => "required", 
        ]);

        $avatar->nom = $request->nom; 

        if ($request->file('img') != NULL) {
            $request->file('img')->storePublicly('img/avs/','public');
            $avatar->name = $request->file('img')->hashName();
        }

        $avatar->save(); 

        return redirect()->route('avatar.index')->with('success', 'Avatar bien modifié.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Avatar  $avatar
     * @return \Illuminate\Http\Response
     */
    public function destroy(Avatar $avatar)
    {
        //Storage::delete("public/img/avs/".$avatar->name);
        $avatar->delete(); 
        return redirect()->route('avatar.index');
    }


    //marche pas 
    public function download($avatar){ 
        return Storage::disk('public')->download('/img/avs/'. $avatar);
    }
}
