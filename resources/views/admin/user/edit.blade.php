<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-12">
            @if (Auth::user()->role_id == 1 || Auth::user()->role_id == $user->id)
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <p> Modifier l'user: {{$user->id}} </p>
                            <form action="{{route('user.update', $user->id)}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="flex flex-col">
                                    <label for="nom">Nom: </label>
                                    <input type="text" name="nom" class="m-0" value="{{$user->name}}"/> 
                                    @error('nom')
                                        <p class="text-red-500 text-right">
                                            <strong>{{$message}}</strong>
                                        </p>
                                    @enderror
                                </div>

                                <div class="flex flex-col">
                                    <label for="prenom">Prénom: </label>
                                    <input type="text" name="prenom" class="m-0" value="{{$user->prenom}}"/> 
                                    @error('prenom')
                                        <p class="text-red-500 text-right">
                                            <strong>{{$message}}</strong>
                                        </p>
                                    @enderror
                                </div>

                                <div class="flex flex-col">
                                    <label for="prenom">email: </label>
                                    <input type="email" name="email" class="m-0" value="{{$user->email}}"/> 
                                    @error('email')
                                        <p class="text-red-500 text-right">
                                            <strong>{{$message}}</strong>
                                        </p>
                                    @enderror
                                </div>

                                <div class="flex flex-col">
                                    <label for="dated">Année de naissance: </label>
                                    <input type="number" name="dated" class="m-0" value="{{$user->age}}"/> 
                                    @error('dated')
                                        <p class="text-red-500 text-right">
                                            <strong>{{$message}}</strong>
                                        </p>
                                    @enderror
                                </div>
                                
                                @admin
                                <div class="flex flex-col">
                                    <label for="role">Role: </label>
                                    <select name="role">
                                        @foreach ($roles as $role)
                                            <option value="{{$role->id}}" {{ $role->id == $user->role_id ? 'selected' : '' }}>{{$role->nom}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @endadmin

                                <br/>
                                <div class="flex flex-col">
                                    
                                    <label for="img">Avatar:</label>
                                    <div id="avimg">
                                        <img id="imgavth" class="w-32 h-32 rounded-md mx-auto" src="{{ asset('img/avs/'.$user->avatar->name)}}" />
                                    </div>
                                    <select name="avatar" id="selavatar">
                                        @foreach ($avs as $av)
                                            <option value="{{$av->id}}" {{ $av->id == $user->avatar_id ? 'selected' : ''}}>{{$av->nom}}</option>
                                        @endforeach
                                    </select>

                                    <input type="file" name="img" value="{{$user->avatar->name}}" />
                                    <p class="text-green-500 ">
                                        <small>Ne pas uploader de nouvelle image si que le nom change.</small>
                                    </p>
                                    @error('img')
                                        <p class="text-red-500 text-right">
                                            <strong>{{$message}}</strong>
                                        </p>
                                    @enderror
                                </div>
                                <div class="mt-5 text-center">
                                    <input type="submit" value="Modifier >> " class="bg-green-400 p-2 rounded-md">
                                </div>
                            </form>
                        </div> 
                    </div>
                </div>
            @else
                <div class="text-white px-6 py-4 border-0 rounded relative mb-4 bg-red-500 w-full">
                    <strong>Cette page n'est pas pour toi :* </strong>
                </div>
            @endif
    </div>


</x-app-layout>