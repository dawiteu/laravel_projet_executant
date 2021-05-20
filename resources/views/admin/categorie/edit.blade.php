<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-12">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-8 bg-white border-b border-gray-200">
                    <p>Edit une catégorie: (id : {{$categorie->id}}) </p>
                    <form action="{{route('categorie.update', $categorie->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="flex flex-col">
                            <label for="nom">Nom: </label>
                            <input type="text" name="nom" class="m-0" value="{{$categorie->nom}}" /> 

                            @error('nom')
                                <p class="text-red-500 text-right">
                                    <strong>{{$message}}</strong>
                                </p>
                            @enderror
                        </div>
                        <div class="mt-5 text-center">
                            <input type="submit" value="Ajouter >> " class="bg-green-400 p-2 rounded-md">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



</x-app-layout>