<x-app-layout>

    <div class="py-12 w-full" >
        <div class="text-left"> 
            <a href="{{ route('gallerie') }}" class="btn bg-white rounded-md m-4 p-4 ">Retour Galleries</a>
        </div>

        <div class="flex flex-wrap m-4 p-5">
            @foreach ($imgs as $img)
                {{-- {{ $img }} <br/>  --}}
                <img src="{{ asset('img/photos/'.$img->lien) }}" alt="">
            @endforeach
        </div>
        
        <div class="w-6/12 mx-auto">{{ $imgs->links() }}</div>
        
    </div>


</x-app-layout>