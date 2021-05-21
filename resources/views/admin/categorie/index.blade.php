<x-app-layout>

    <div class="py-12 w-full" >
        <div class="text-center"> 
            <a href="{{route('categorie.create')}}"><button class="text-white bg-gray-600 m-1 p-2 rounded-md ">Ajouter +</button></a>
        </div>

        <div class="flex flex-wrap m-4 p-5">

            @foreach ($cats as $cat)
                <div class="bg-white rounded-md m-5 p-10 flex flex-col text-center">
                    <p>Nom: {{$cat->nom}}</p>
                    <div class="flex justify-center"> 
                        @if ($cat->id > 1)
                            <a href="{{route('categorie.edit', $cat->id)}}" class="btn bg-yellow-500 p-1 m-2 rounded-sm text-white">M</a>
                            <form action="{{route('categorie.destroy', $cat->id)}}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn bg-red-500 p-1 m-2 rounded-sm text-white">X</button>
                            </form>
                        @endif
                        
                    </div>
                </div>
            @endforeach


        </div>
        
        {{-- <div class="w-6/12 mx-auto">{{ $cats->links() }}</div> --}}
        
    </div>


</x-app-layout>