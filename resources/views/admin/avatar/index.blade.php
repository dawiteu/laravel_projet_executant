<x-app-layout>

    <div class="py-12 w-full" >
        <div class="text-center"> 
            <a href="{{route('avatar.create')}}"><button class="text-white bg-gray-600 m-1 p-2 rounded-md ">Ajouter +</button></a>
        </div>

        <div class="flex flex-wrap m-4 p-5">

            @foreach ($avs as $av)
                <div class="bg-white rounded-md m-5 p-10 flex flex-col text-center">
                    <img class="w-32 h-32 rounded-md" src="{{ asset('img/avs/'.$av->name)}}" />
                    <p>Nom: {{$av->nom}}</p>
                    <p>Envoyer par: {{ $av->prov == 'admin' ? 'défaut' : "user id(".$av->user[0]->id.")"  }}</p>
                    <div class="flex justify-center"> 
                        <a href="{{route('avatar.download', $av->id)}} " class="btn bg-pink-500 p-1 m-2 rounded-sm text-white">T</a>
                        <a href="{{route('avatar.edit', $av->id)}}" class="btn bg-yellow-500 p-1 m-2 rounded-sm text-white">M</a>
                        <form action="{{route('avatar.destroy', $av->id)}}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn bg-red-500 p-1 m-2 rounded-sm text-white">X</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
        
        <div class="w-6/12 mx-auto">{{ $avs->links() }}</div>
        
    </div>


</x-app-layout>