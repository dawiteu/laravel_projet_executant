<?php

namespace App\Http\Controllers;

use App\Models\Avatar;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index(){
        $uss = User::paginate(10); 
        return view('admin.user.index', compact('uss')); 
    }

    public function edit(User $user){
        $roles = Role::all();
        $avs = Avatar::all();
        return view('admin.user.edit', compact('user', 'roles', 'avs')); 
    }

    public function update(Request $request, User $user){

        $this->authorize('isRealUser', $user); 

            $request->validate([
                'nom' => 'required|string|max:255',
                'email' => 'required|string|email|max:255',
                'prenom' => 'required|string|max:255',
                'dated' =>   'required|numeric|min:1902|max:2021', // oui oui pas top le 2021
            ]);

            //dd($user->avatar_id);

            $avimg = $user->avatar_id; 

            $user->name  = $request->nom; 
            $user->email = $request->email; 
            $user->prenom = $request->prenom; 
            $user->age    = $request->dated; 
            $user->role_id = $request->role; 

        if ($request->file('img') != NULL) {
            $request->file('img')->storePublicly('img/avs/','public');
            $av = new Avatar(); 
            $av->nom  = $request->name . " avatar"; 
            $av->name = $request->file('img')->hashName();
            $av->prov = 'user';
            $av->save(); 

            $query = DB::select('select id from avatars where id = '.$av->id.'', [1]); 
            $user->avatar_id = $query[0]->id;
        }else{
            $user->avatar_id = $request->avatar; 
        }

        $user->save(); 
        return redirect()->route('user.index')->with('success','User bien modifié.'); 
    }
}
