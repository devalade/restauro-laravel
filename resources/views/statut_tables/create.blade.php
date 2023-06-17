<x-app-layout>
    <x-slot name="header">
        {{ __('Créer un statut que la table peut avoir') }}
    </x-slot>



    <div class="inline-block overflow-hidden min-w-full rounded-lg shadow">
        <form action="{{route('statut_tables.store')}}" method="POST">
            @method('POST')
            @csrf
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mt-4 mb-4">
                <div>
                    <x-input-label for="libelle" :value="__('Libelle')"/>
                    <x-text-input type="text"
                                  name="libelle"
                                  id="libelle"
                                  value="{{ old('libelle')}}"
                                  required
                    />
                    <x-input-error :messages="$errors->get('libelle')" class="mt-2" />
                </div>
            </div>
            <x-primary-button>Créer un statut</x-primary-button>
        </form>

    </div>

</x-app-layout>
