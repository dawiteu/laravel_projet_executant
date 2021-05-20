<x-app-layout>

    <div class="py-12 w-full" >
        <div class="text-center"> 
            <a href="{{route('image.create')}}"><button class="text-white bg-gray-600 m-1 p-2 rounded-md ">Ajouter +</button></a>
            @if (count($imgs) <= 0)
                <p>pas d'images disponibles... </p>
            @endif
        </div>

        <div class="flex flex-wrap m-4 p-5">

            @foreach ($imgs as $img)
                <div class="bg-white rounded-md m-5 p-10 flex flex-col text-center">
                    <p>Nom: {{$img->nom}}</p>
                    <p>Catégorie: {{ $img->categorie->nom }} </p>
                    <img class="w-32 h-32 rounded-md mx-auto" src="{{ asset('img/photos/'.$img->lien)}}" />
                    <div class="flex justify-center">
                        <a href="{{route('image.edit', $img->id)}}" class="btn bg-yellow-500 p-1 m-2 rounded-sm text-white">M</a>
                        <form action="{{route('image.destroy', $img->id)}}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn bg-red-500 p-1 m-2 rounded-sm text-white">X</button>
                        </form>
                    </div>
                </div>
            @endforeach


        </div>
        
        <div class="w-6/12 mx-auto">{{ $imgs->links() }}</div>
        
    </div>


</x-app-layout>