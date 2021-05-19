<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Name')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>

             <!-- Prenom Address -->
             <div class="mt-4">
                <x-label for="prenom" :value="__('Prenom')" />

                <x-input id="prenom" class="block mt-1 w-full" type="text" name="prenom" :value="old('prenom')" required />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="text" name="email" :value="old('email')" required />
            </div>

             <!-- Age Address -->
             <div class="mt-4">
                <x-label for="age" :value="__('Année de naissance')" />

                {{-- <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required /> --}}
            
                <select name="age">
                    @for ($i = date('Y'); $i > (date('Y')-120); $i--)
                        <option value="{{$i}}"> {{$i}} </option>
                    @endfor
                </select>
            </div>

             <!-- Avatar Address -->
             <div class="mt-4">
                <x-label for="avatar" :value="__('Avatar')" />

                <x-input id="avatar" class="block mt-1 w-full" type="file" name="av2" :value="old('avatar1')"  />
            
                <select name="av1">
                    {{-- <option value=""></option> --}}
                    @foreach ($avs as $av)
                    
                        <option value="{{$av->id}}">
                            {{$av->nom}}
                            {{-- <img src="{{asset('img/avs/'.$av->name)}}" alt="{{$av->nom}}"> --}}
                        </option>
                    @endforeach
                </select>
            </div>


            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
