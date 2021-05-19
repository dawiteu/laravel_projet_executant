<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('ALL avatars') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-12">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="row">
                        @foreach ($avs as $av)
                            <div class="col-1">
                                <img class="w-32 h-32 " src="{{ asset('img/avs/'.$av->name)}}" />
                            </div>
                        @endforeach
                    </div>
                    
                </div>
            </div>
        </div>
    </div>


</x-app-layout>