<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-12">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <p> Ajouter un avatar: <br/><small>(Déjà uploader: {{ count($avatars) }} / 5)</small></p>
                    <form action="{{route('avatar.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="flex flex-col">
                            <label for="nom">Nom: </label>
                            <input type="text" name="nom" class="m-0" value="{{old('nom')}}" /> 
                            @error('nom')
                                <p class="text-red-500 text-right">
                                    <strong>{{$message}}</strong>
                                </p>
                            @enderror
                        </div>
                        <div class="flex flex-col">
                            <label for="img">Image:</label>
                            <input type="file" name="img" value="{{old('img')}}" />
                            @error('img')
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