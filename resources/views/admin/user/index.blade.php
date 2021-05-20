<x-app-layout>

    <div class="py-12 w-full" >
        <div class="text-center"> 
            {{-- <a href="{{route('user.create')}}"><button class="text-white bg-gray-600 m-1 p-2 rounded-md ">Ajouter +</button></a> --}}
            <p class="text-center">Nombre d'users: {{ count($uss) }} </p>
        </div>

        <div class="flex flex-wrap m-4 p-5">

            @foreach ($uss as $us)
                
                <div class="bg-white rounded-md m-5 p-10 flex flex-col text-center">
                    <img class="w-32 h-32 rounded-md mx-auto" src="{{ asset('img/avs/'.$us->avatar->name)}}" />
                    <p>Nom: {{$us->name}}</p>
                    <p>Email: {{$us->email }} </p>
                    <p>Prénom: {{$us->prenom }} </p>
                    <p>Age: {{$us->age }} </p>
                    <p>Role: {{ $us->role->nom }}</p>
                    <div class="flex justify-center"> 
                        @if ($us->id > 1)
                            <a href="{{route('user.edit', $us->id)}}" class="btn bg-yellow-500 p-1 m-2 rounded-sm text-white">M</a>
                            <form action="{{route('user.destroy', $us->id)}}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn bg-red-500 p-1 m-2 rounded-sm text-white" onClick="confirm('sur?!');">X</button>
                            </form>
                        @endif
                    </div>
                </div>               
                
            @endforeach
        </div>
        
        {{-- <div class="w-6/12 mx-auto">{{ $avs->links() }}</div> --}}
        
    </div>


</x-app-layout>