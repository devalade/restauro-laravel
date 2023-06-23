<x-app-layout>
    <x-slot name="header">
        {{ __('Créer un employée') }}
    </x-slot>



    <div class="inline-block overflow-hidden min-w-full rounded-lg shadow">
        <form action="{{  route('users.store') }}" method="POST">
            @csrf
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mt-4 mb-4">
                <div>
                    <x-input-label for="nom" :value="__('Nom')"/>
                    <x-text-input type="text"
                                  name="nom"
                                  id="nom"
                                  value="{{ old('nom')}}"
                    />
                    <x-input-error :messages="$errors->get('nom')" class="mt-2" />
                </div>
                <div>
                    <x-input-label for="prenom" :value="__('Prenom')"/>
                    <x-text-input type="text"
                                  name="prenom"
                                  id="prenom"
                                  value="{{ old('prenom')}}"
                    />
                    <x-input-error :messages="$errors->get('prenom')" class="mt-2" />
                </div>
                <div>
                    <x-input-label for="sexe" :value="__('Sexe')"/>
                    <x-text-input type="text"
                                  name="sexe"
                                  id="sexe"
                                  value="{{ old('sexe')}}"
                    />
                    <x-input-error :messages="$errors->get('sexe')" class="mt-2" />
                </div>
                <div>
                    <x-input-label for="contact" :value="__('Contact')"/>
                    <x-text-input type="text"
                                  name="contact"
                                  id="contact"
                                  value="{{ old('contact')}}"
                    />
                    <x-input-error :messages="$errors->get('contact')" class="mt-2" />
                </div>
                <div>
                    <x-input-label for="email" :value="__('Email')"/>
                    <x-text-input type="text"
                                  name="email"
                                  id="email"
                                  value="{{ old('email')}}"
                    />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>


            </div>
            <x-primary-button type="submit">Créer un employé</x-primary-button>
        </form>

    </div>

</x-app-layout>
