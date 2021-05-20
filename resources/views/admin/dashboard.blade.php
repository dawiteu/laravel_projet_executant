<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot> --}}

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-12">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 text-center shadow-sm">
                    <h2>Bonjour {{ Auth::User()->prenom}}</h2>
                    <img class="w-32 h-32 rounded-full mx-auto" src="{{ asset('img/avs/'. Auth::User()->avatar->name)}}" alt="{{Auth::User()->name}}">
                    <strong>{{ Auth::User()->avatar->nom }}</strong>
                    <p>Email: {{ Auth::User()->email }} </p>
                    <p>Prenom: {{ Auth::User()->prenom}}</p>
                    <p>Age: {{ (Date('Y') - Auth::User()->age) }}</p>
                    <p>Niveau: {{ Auth::User()->role->nom }} </p> <br/> 
                    <a href="{{route('user.edit', Auth::user()->id)}}" class="shadow-md mt-6 m-1 p-3 bg-green-400 rounded-md text-white">Modifier</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
