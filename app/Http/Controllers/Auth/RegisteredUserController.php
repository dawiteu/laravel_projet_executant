<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Avatar;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $avs = Avatar::all()->where('prov', 'admin')->take(5);  
        return view('auth.register', compact('avs'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => ['required', 'confirmed', Rules\Password::min(8)],
            'prenom' => 'required|string|max:255',
            'age' =>   'required|numeric',
        ]);

        $imgid = 1; // par def no av ;; 
        if ($request->file('av2') != NULL) {
            $request->file('av2')->storePublicly('img/avs/','public');
            //DB::insert('insert into avatarsrel (uploader_id, name) values (?, ?)', [1, 'Dayle']);
            $av = new Avatar(); 
            $av->nom  = $request->name . " avatar"; 
            $av->name = $request->file('av2')->hashName();
            $av->prov = 'user';
            $av->save(); 

            $query = DB::select('select id from avatars where id = '.$av->id.'', [1]); 
            $imgid = $query[0]->id;
        }else{
            $imgid = $request->av1;
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'prenom' => $request->prenom,
            'age' => $request->age,
            'avatar_id' => $imgid, 
            'role_id' => 2, //user par def 
        ]);

        // if(event(new Registered($user))){
        //     DB::insert('insert into avatarsrel (uploader_id, avatar_id) values ('.$user->id.', '.$imgid.')', [1, 'Dayle']);
        // }

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
