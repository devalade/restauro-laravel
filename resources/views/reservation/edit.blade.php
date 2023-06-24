<x-app-layout>
    <x-slot name="header">
        {{ __('Modifier Utilisateur') }}
    </x-slot>

    

    <div class="inline-block overflow-hidden min-w-full rounded-lg shadow">
        <form action="{{route('users.update', $user)}}" method="POST">
            @method('PATCH')
            @csrf

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mt-4">
                    <div>
                        <x-input-label for="nom" :value="__('Nom')"/>
                        <x-text-input type="text"
                                 name="nom"
                                 id="nom"
                                 value="{{ old('nom') ?? $user->nom }}"
                                 required
                        />
                        <x-input-error :messages="$errors->get('nom')" class="mt-2" />
                    </div>

                    <div>
                        <x-input-label for="prenom" :value="__('Prenom')"/>
                        <x-text-input type="text"
                                 name="prenom"
                                 id="prenom"
                                 value="{{ old('prenom') ?? $user->prenom }}"
                                 required
                        />
                        <x-input-error :messages="$errors->get('prenom')" class="mt-2" />
                    </div>

                    <div>
                        <x-input-label for="sexe" :value="__('Sexe')"/>
                        <x-text-input type="text"
                                 name="sexe"
                                 id="sexe"
                                 value="{{ old('sexe') ?? $user->sexe }}"
                                 required
                        />
                        <x-input-error :messages="$errors->get('sexe')" class="mt-2" />
                    </div>

                    <div>
                        <x-input-label for="contact" :value="__('Contact')"/>
                        <x-text-input type="text"
                                 name="contact"
                                 id="contact"
                                 value="{{ old('contact') ?? $user->contact }}"
                                 required
                        />
                        <x-input-error :messages="$errors->get('contact')" class="mt-2" />
                    </div>

                    <div>
                        <x-input-label for="email" :value="__('Email')"/>
                        <x-text-input type="email"
                                 name="email"
                                 id="email"
                                 value="{{ old('email') ?? $user->email }}"
                                 required
                        />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    

                    
                </div>
            
            @foreach ($roles as $role)
                <div class="mb-4">    
                    <input type="checkbox" class="form-checkbox mx-2" name="roles[]" value="{{$role->id}}" 
                    id="{{$role->id}}" @if ($user->roles->pluck('id')->contains($role->id))
                        checked
                    @endif>
                    <label class="inline-flex items-center" for="{{$role->id}}">{{$role->nom}}</label>
                </div>
            @endforeach
            <button class="bg-blue-500 text-white px-4 py-2 my-2 mx-2 rounded block" type="submit">Modifier les rôles</button>
        </form>
        
    </div>

</x-app-layout>
