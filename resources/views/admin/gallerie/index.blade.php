<x-app-layout>

    <div class="py-12 w-full" >
        <div class="text-center"> 
            <p>Actuellement il a {{count($cats)}} galleries (catégories).</p>
        </div>
        <div class="flex flex-wrap m-4 p-5">
            @foreach ($cats as $cat)

                    <div class="bg-white rounded-md m-2 p-6 flex flex-col text-center">
                        <p>Nom: {{$cat->nom}}</p>

                        @if ($cat->firstimg != NULL)
                            <img class="w-32 h-32 rounded-md" src="{{ asset('img/photos/'.$cat->firstimg->lien)}}" />
                        @else
                            <img class="w-32 h-32 rounded-md" src="https://www.verdantis.com/wp-content/uploads/2016/04/noimg.jpg" />
                        @endif

                        <p>Nombre d'images: {{ $cat->images->count() }} </p>
                    </div>     
                {{-- @endif --}}
            @endforeach
        </div>
        </div>
        
        <div class="w-6/12 mx-auto">{{ $cats->links() }}</div>
        
    </div>


</x-app-layout>