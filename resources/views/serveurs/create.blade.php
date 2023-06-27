<x-app-layout>
    <x-slot name="header">
        {{ __('Créer un serveur') }}
    </x-slot>



    <div class="inline-block overflow-hidden min-w-full rounded-lg shadow">
        <form action="{{  route('serveurs.store') }}" method="post">
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
                    <x-input-label for="contact" :value="__('Contact')"/>
                    <x-text-input type="text"
                                  name="contact"
                                  id="contact"
                                  value="{{ old('contact')}}"
                    />
                    <x-input-error :messages="$errors->get('contact')" class="mt-2" />
                </div>
                <div>
                    <x-input-label for="adresse" :value="__('Adresse')"/>
                    <x-text-input type="text"
                                  name="adresse"
                                  id="adresse"
                                  value="{{ old('adresse')}}"
                    />
                    <x-input-error :messages="$errors->get('adresse')" class="mt-2" />
                </div>
                
                
            </div>
            <x-primary-button type="submit">Créer un serveur</x-primary-button>
        </form>



    </div>

</x-app-layout>
